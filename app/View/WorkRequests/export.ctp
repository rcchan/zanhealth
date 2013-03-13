No.	Request ID	Asset Name	Asset Number	Received Date	Required Date	Priority	Type	Assigned To	Work Trade
<? foreach ($data as $i => $d){ ?>
<?= $i + 1 ?>	<?= $d['WorkRequest']['id'] ?>	<?= $d['Item']['name'] ?>	<?= $d['Item']['identifier'] ?>	<?= $d['WorkRequest']['date'] ?>	<?= $d['WorkRequest']['expire'] ?>	<?= $d['WorkPriority']['name'] ?>	<?= $d['WorkRequest']['type'] ?>	<?= $d['WorkRequest']['owner'] ?>	<?= $d['WorkTrade']['name'] ?>

<? } ?>