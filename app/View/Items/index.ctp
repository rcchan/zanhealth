<? $this->Html->script('jquery.dataTables.min', array('inline' => false)) ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#items').dataTable({
      "bJQueryUI": true,
      "sPaginationType": "full_numbers",
      "bPaginate": false,
      //"sScrollX": "100%",
      //"sScrollY": "400px"
    }).wrap('<div style="width:100%; height: 500px; overflow: auto; white-space: nowrap;">').parent().doubleScroll().css('overflow-y', 'auto');
  });
</script>
  <table id="items">
    <thead>
      <tr>
        <th>No.</th>
        <th>Asset No.</th>
        <th>Asset Name</th>
        <th>Category</th>
        <th>Utilization</th>
        <th>Status</th>
        <th>Health Facility</th>
        <th>Room Name</th>
        <th>Manufacturer</th>
        <th>Model No.</th>
        <th>Serial No.</th>
        <th>Year</th>
        <th>Received Date</th>
        <th>Purchase Price</th>
        <th>Vendor</th>
        <th>Funding</th>
        <th>Warranty</th>
        <th>Contract</th>
      </tr>
    </thead>
    <tbody>
      <? foreach ($data as $i => $d){ ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td>U-MM-<?= $d['Item']['id'] ?>/HCEU</td>
          <td><?= $d['Item']['name'] ?></td>
          <td><?= $d['Category']['name'] ?></td>
          <td><?= $d['Item']['utilization'] ?></td>
          <td><?= $d['Item']['status'] ?></td>
          <td><?= $d['Facility']['name'] ?></td>
          <td><?= $d['Item']['room'] ?></td>
          <td><?= $d['Item']['manufacturer'] ?></td>
          <td><?= $d['Item']['model'] ?></td>
          <td><?= $d['Item']['serial_number'] ?></td>
          <td><?= $d['Item']['year_manufactured'] ?></td>
          <td><?= $d['Item']['date_received'] ?></td>
          <td><?= $d['Item']['price'] ?></td>
          <td><?= $d['Vendor']['name'] ?></td>
          <td><?= $d['Item']['funding'] ?></td>
          <td><?= $d['Item']['warranty_expiry'] ?></td>
          <td><?= $d['Item']['contract_expiry'] ?></td>
        </tr>
      <? } ?>
    </tbody>
  </table>
</div>