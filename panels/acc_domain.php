<?php
// File           acc_domain.php / FirebirdWebAdmin
// Purpose        html sequence for the domains-panel in accessories.php
// Author         Lutz Brueckner <irie@gmx.de>
// Copyright      (c) 2000, 2001, 2002, 2003, 2004 by Lutz Brueckner,
//                published under the terms of the GNU General Public Licence v.2,
//                see file LICENCE for details

if (isset($s_confirmations['domain'])):
    $subject = 'domain';
    include './panels/confirm.php';

elseif (isset($dom_add_flag)):

    echo js_collations($s_charsets);
    ?>
    <form method="post" action="<?php echo url_session($_SERVER['PHP_SELF']); ?>" name="acc_domain_form">
        <table class="table table-bordered">
        <?php

        echo get_datatype_definition('dom', $acc_strings['CreateDom'], 1, true);
        echo get_domain_constraint($s_coldefs['dom']);
        ?>
        </table>
        <input type="submit" name="acc_dom_create_doit" value="<?php echo $button_strings['Create']; ?>" class="btn btn-success">
        <input type="reset" name="acc_dom_create_clear" value="<?php echo $button_strings['Reset']; ?>" class="btn btn-default">
        <input type="submit" name="acc_dom_create_cancel" value="<?php echo $button_strings['Cancel']; ?>" class="btn btn-default">
    </form>
<?php

elseif (isset($dom_mod_flag)):

    ?>
    <form method="post" action="<?php echo url_session($_SERVER['PHP_SELF']); ?>" name="acc_moddom_form">
        <table class="table table-bordered" cellpadding="5">
            <?php

            echo get_datatype_definition('dom', sprintf($acc_strings['ModDomain'], $s_mod_domain));
            echo get_domain_constraint($s_coldefs['dom'], false);
            ?>
        </table>
        <input type="submit" name="acc_moddom_doit" value="<?php echo $button_strings['Save']; ?>" class="btn btn-success">
        <input type="reset" name="acc_dommod_clear" value="<?php echo $button_strings['Reset']; ?>" class="btn btn-default">
        <input type="submit" name="acc_moddom_cancel" value="<?php echo $button_strings['Cancel']; ?>" class="btn btn-default">
    </form>
<?php

elseif ($s_connected):

    if (count($s_domains) > 0) {
        echo get_domain_table($s_domains);
    }

    echo '<form method="post" action="'.url_session($_SERVER['PHP_SELF'])."\" name=\"acc_domain_form\">\n";

    if (count($s_domains) > 0) {
        echo '<input type="submit" class="btn btn-default btn-xs" name="acc_domain_reload" value="'.$button_strings['Reload']."\">\n";
        echo "<br><br>\n";
    }
    ?>
<table>
<tr>
  <th colspan="2" align="left"><?php echo $acc_strings['CreateDom']; ?></th>
  <td><input type="submit" name="acc_domain_create" class="btn btn-primary" value="<?php echo $button_strings['Create']; ?>"></td>
</tr>
<tr>
  <td>
    <b><?php echo $acc_strings['SelDomMod']; ?></b>
  </td>
  <td>
    <?php echo get_selectlist('acc_domain_mname', array_keys($s_domains), null, true); ?>
  </td>
  <td align="left">
    <input type="submit" name="acc_domain_mod" class="btn btn-success" value="<?php echo $button_strings['Modify']; ?>">
  </td>
</tr>
<tr>
  <td>
    <b><?php echo $acc_strings['SelDomDel']; ?></b>
  </td>
  <td>
    <?php echo get_selectlist('acc_domain_dname', array_keys($s_domains), null, true); ?>
  </td>
  <td align="left">
    <input type="submit" name="acc_domain_del" class="btn btn-danger" value="<?php echo $button_strings['Delete']; ?>">
  </td>
</tr>
</table>
</form>
<?php

endif;

?>
