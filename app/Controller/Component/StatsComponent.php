<?
App::uses('Component', 'Controller');
class StatsComponent extends Component {
  function startup(&$controller) {
    $this->controller = $controller; // Stores reference Controller in the component
  }
  public function getStats(){
    $item = ClassRegistry::init('Item');
    $data = $item->query('SELECT status, COUNT(*) as count FROM items GROUP BY status');
    $stats = array('status' => array(), 'utilization' => array());
    foreach($data as $d) $stats['status'][] = array($d['items']['status'], intval($d[0]['count']));
    $data = $item->query('SELECT utilization, COUNT(*) as count FROM items GROUP BY utilization');
    foreach($data as $d) $stats['utilization'][] = array($d['items']['utilization'], intval($d[0]['count']));
    $this->controller->set(array('stats' => $stats)); // Sets data from myQuery in view
  }
}
?>