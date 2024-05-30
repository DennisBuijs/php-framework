<table
    <?php foreach ($viewModel["customers"] as $customer) { ?>
    <tr>
        <td><?= $customer->name ?></td>
        <td><?= $customer->email ?></td>
    </tr>
    <?php } ?>
</table>
