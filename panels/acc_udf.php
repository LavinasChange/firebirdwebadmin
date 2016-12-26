<?php
// File           acc_udf.php / FirebirdWebAdmin
// Purpose        html sequence for the user defined functions panel in accessories.php
// Author         Lutz Brueckner <irie@gmx.de>
// Copyright      (c) 2000, 2001, 2002, 2003, 2004 by Lutz Brueckner,
//                published under the terms of the GNU General Public Licence v.2,
//                see file LICENCE for details

if (isset($s_confirmations['udf'])) {
    $subject = 'udf';
    include './panels/confirm.php';
} elseif ($s_connected == true) {
    ?>
    <form method="post" action="<?php echo url_session($_SERVER['PHP_SELF']);
    ?>" name="acc_udf_form">
        <?php

        if (!empty($s_udfs)) {
            echo get_udf_table($s_udfs, $s_udfs_order, $s_udfs_dir);
        }
        echo '<input type="submit" class="btn btn-default btn-xs" name="acc_udf_reload" value="' . $button_strings['Reload'] . "\">\n";

        ?>
        <br><br>
        <table>
            <tr>
                <td><label for="acc_udf_dname"><?php echo $acc_strings['SelUdfDel']; ?></label></td>
                <td><?php echo get_udf_select('acc_udf_dname'); ?></td>
                <td align="left">
                    <input type="submit" class="btn btn-danger margin-left-10px" name="acc_udf_del" value="<?php echo $button_strings['Delete']; ?>">
                </td>
            </tr>
        </table>
    </form>
    <?php

}

?>
