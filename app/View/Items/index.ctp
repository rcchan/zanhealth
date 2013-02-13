<?
/**************************************************************************\
* Copyright 2013 Ryan Chan <ryan@rcchan.com>                               *
*                                                                          *
* This program is free software: you can redistribute it and/or modify     *
* it under the terms of the GNU Affero General Public License as           *
* published by the Free Software Foundation, either version 3 of the       *
* License, or (at your option) any later version.                          *
*                                                                          *
* This program is distributed in the hope that it will be useful,          *
* but WITHOUT ANY WARRANTY; without even the implied warranty of           *
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            *
* GNU Affero General Public License for more details.                      *
*                                                                          *
* You should have received a copy of the GNU Affero General Public License *
* along with this program.  If not, see <http://www.gnu.org/licenses/>.    *
*                                                                          *
*                                                                          *
* Additional permission under the GNU Affero GPL version 3 section 7:      *
*                                                                          *
* If you modify this Program, or any covered work, by linking or           *
* combining it with other code, such other code is not for that reason     *
* alone subject to any of the requirements of the GNU Affero GPL           *
* version 3.                                                               *
\**************************************************************************/
?>
<? $this->Html->script('jquery.dataTables.min', array('inline' => false)) ?>
<script type="text/javascript">
  $(document).ready(function(){
    var dt = $('#items').dataTable({
      "bJQueryUI": true,
      "sPaginationType": "full_numbers",
      "bPaginate": false,
      //"sScrollX": "100%",
      //"sScrollY": "400px"
    });
    dt.wrap('<div style="width:100%; max-height: 500px; overflow: auto; white-space: nowrap;">').parent().doubleScroll().css('overflow-y', 'auto');
    
    $('thead.data_filters input').keyup( function () {
      dt.fnFilter( this.value, $('thead.data_filters input, thead.data_filters select').index(this) );
    } );
    $('thead.data_filters select').change( function () {
      dt.fnFilter( this.value, $('thead.data_filters input, thead.data_filters select').index(this) );
    } );    
  });
</script>
<div>
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
        <th>Year Manufactured</th>
        <th>Received Date</th>
        <th>Purchase Price</th>
        <th>Vendor</th>
        <th>Funding</th>
        <th>Warranty</th>
        <th>Contract</th>
      </tr>
    </thead>
    <thead class="data_filters">
      <tr>
        <td><input type="text" placeholder="Filter by No."></td>
        <td><input type="text" placeholder="Filter by Asset No."></td>
        <td><input type="text" placeholder="Filter by Asset Name"></td>
        <td>
          <select>
            <option value="">Filter by Category</option>
            <? foreach ($categories as $c){ ?>
              <option value="<?= $c ?>"><?= $c ?></option>
            <? } ?>
          </select>
        </td>
        <td><input type="text" placeholder="Filter by Utilization"></td>
        <td><input type="text" placeholder="Filter by Status"></td>
        <td>
          <select>
            <option value="">Filter by Health Facility</option>
            <? foreach ($facilities as $c){ ?>
              <option value="<?= $c ?>"><?= $c ?></option>
            <? } ?>
          </select>
        </td>
        <td><input type="text" placeholder="Filter by Room Name"></td>
        <td><input type="text" placeholder="Filter by Manufacturer"></td>
        <td><input type="text" placeholder="Filter by Model No."></td>
        <td><input type="text" placeholder="Filter by Serial No."></td>
        <td><input type="text" placeholder="Filter by Year"></td>
        <td><input type="text" placeholder="Filter by Received Date"></td>
        <td><input type="text" placeholder="Filter by Purchase Price"></td>
        <td>
          <select>
            <option value="">Filter by Vendor</option>
            <? foreach ($categories as $c){ ?>
              <option value="<?= $c ?>"><?= $c ?></option>
            <? } ?>
          </select>
        </td>
        <td><input type="text" placeholder="Filter by Funding"></td>
        <td><input type="text" placeholder="Filter by Warranty"></td>
        <td><input type="text" placeholder="Filter by Contract"></td>
      </tr>
    </thead>
    <tbody>
      <? foreach ($data as $i => $d){ ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= $d['Item']['identifier'] ?></td>
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