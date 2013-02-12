<? $this->Html->script('jquery.dataTables.min', array('inline' => false)) ?>
<script type="text/javascript">
  $(document).ready(function(){
    var dt = $('#requests').dataTable({
      "bJQueryUI": true,
      "sPaginationType": "full_numbers",
      "bPaginate": false,
      "oLanguage": { "sZeroRecords": "No work orders were found" }
    });
    dt.wrap('<div style="width:100%; height: 500px; overflow: auto; white-space: nowrap;">').parent().doubleScroll().css('overflow-y', 'auto');
    
    $('thead.data_filters input').keyup( function () {
      dt.fnFilter( this.value, $('thead.data_filters input, thead.data_filters select').index(this) );
    } );
    $('thead.data_filters select').change( function () {
      dt.fnFilter( this.value, $('thead.data_filters input, thead.data_filters select').index(this) );
    } );    
  });
</script>
<div style="position: relative">
  <?=
    $this->Html->link(
      $this->Html->image('new_work_request.png'),
      array('action' => 'create'),
      array('escape' => false, 'style' => 'position: absolute; top:6px; left: 10px; z-index: 1')
    )
  ?>
  <table id="requests">
    <thead>
      <tr>
        <td>No.</td>
        <td>Requeset ID</td>
        <td>Asset Name</td>
        <td>Asset Number</td>
        <td>Received Date</td>
        <td>Required Date</td>
        <td>Priority</td>
        <td>Type</td>
        <td>Assigned To</td>
        <td>Work Trade</td>
      </tr>
    </thead>
    <tbody>
    <? 
      $count = 0;
      foreach ($data as $d){
    ?>
      <tr>
        <td><?= $count ?></td>
        <td><?= $d['WorkRequest']['id'] ?></td>
        <td><?= $d['Item']['name'] ?></td>
        <td><?= $d['Item']['domain'] ?>-<?= $d['Item']['tag'] ?>/HCEU</td>
        <td><?= $d['WorkRequest']['date'] ?></td>
        <td><?= $d['WorkRequest']['expire'] ?></td>
        <td><?= $d['WorkPriority']['name'] ?></td>
        <td><?= $d['WorkRequest']['type'] ?></td>
        <td><?= $d['WorkRequest']['owner'] ?></td>
        <td><?= $d['WorkTrade']['name'] ?></td>
      </tr>
    <? } ?>
    </tbody>
  </table>
</div>