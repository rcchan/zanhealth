<?
$this->Html->script('highcharts', array('inline' => false));
$this->Html->script('highcharts_exporting', array('inline' => false));
$this->Html->script('highcharts.theme.grid', array('inline' => false));
$this->Html->script('stat', array('inline' => false));
?>

<div class="stats">
  <div class="status"></div>
  <div class="utilization"></div>
</div>

<script type="text/javascript">
zanhealth.pie('Asset Inventory Status', <?= json_encode($stats['status']) ?>, $('.stats .status'));
zanhealth.pie('Asset Utilization', <?= json_encode($stats['utilization']) ?>, $('.stats .utilization'));
</script>