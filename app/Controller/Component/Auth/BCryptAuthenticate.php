<?
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class BCryptAuthenticate extends BaseAuthenticate {

  protected function _findUser($username) {
		$userModel = $this->settings['userModel'];
		list($plugin, $model) = pluginSplit($userModel);
		$fields = $this->settings['fields'];

		$conditions = array(
			$model . '.' . $fields['username'] => $username,
		);
		if (!empty($this->settings['scope'])) {
			$conditions = array_merge($conditions, $this->settings['scope']);
		}
		$result = ClassRegistry::init($userModel)->find('first', array(
			'conditions' => $conditions,
			'recursive' => $this->settings['recursive'],
			'contain' => $this->settings['contain'],
		));
		if (empty($result) || empty($result[$model])) {
			return false;
		}
		$user = $result[$model];
		unset($result[$model]);
		return array_merge($user, $result);
	}
  
  protected function checkPasswords($password, $salt){
    if (!$salt || $password === NULL || $password === '') return false;
    return $salt == Security::hash($password, 'blowfish', $salt);
  }
  
  public function authenticate(CakeRequest $request, CakeResponse $response) {
    $user = self::_findUser($request->data['User']['username']);
    return self::checkPasswords($request->data['User']['password'], $user['password']) ? $user : false;
  }
}
?>