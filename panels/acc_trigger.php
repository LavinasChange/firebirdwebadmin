<?php
// File           acc_trigger.php / FirebirdWebAdmin
// Purpose        html sequence for the triggers-panel in accessories.php
// Author         Lutz Brueckner <irie@gmx.de>
// Copyright      (c) 2000-2006 by Lutz Brueckner,
//                published under the terms of the GNU General Public Licence v.2,
//                see file LICENCE for details

if (isset($s_confirmations['trigger'])):
    $subject = 'trigger';
    include_once './panels/confirm.php';

elseif (isset($trigger_add_flag)):

?>
<form method="post" action="<?php echo url_session($_SERVER['PHP_SELF']); ?>" name="create_trigger_form">
<?php
      echo get_trigger_definition($acc_strings['CreateTrig']);
 ?>
<input type="submit" name="acc_trigger_create_doit" value="<?php echo $button_strings['Create']; ?>" class="btn btn-primary">
<input type="reset" name="acc_trigger_create_clear" value="<?php echo $button_strings['Reset']; ?>" class="btn btn-default">
<input type="submit" name="acc_trigger_create_cancel" value="<?php echo $button_strings['Cancel']; ?>" class="btn btn-default">
</form>
<?php

elseif (isset($trigger_mod_flag)):

?>
<form method="post" action="<?php echo url_session($_SERVER['PHP_SELF']); ?>" name="modify_trigger_form">
<?php
      echo get_trigger_definition(sprintf($acc_strings['ModTrig'], $s_triggerdefs['name']));
?>
<input type="submit" name="acc_trigger_mod_doit" value="<?php echo $button_strings['Save']; ?>" class="btn btn-primary">
<input type="reset" name="acc_trigger_mod_clear" value="<?php echo $button_strings['Reset']; ?>" class="btn btn-default">
<input type="submit" name="acc_trigger_mod_cancel" value="<?php echo $button_strings['Cancel']; ?>" class="btn btn-default">
</form>
<?php

elseif ($s_connected):

    if (count($s_triggers) > 0) {
        foreach ($s_triggers as $tname => $properties) {
            $display = $properties['display'];
            $fold_url = fold_detail_url('trigger', $display, $tname, $tname);

            echo '<div id="'.'r_'.$tname."\" class=\"det\">\n";

            if ($display == 'open') {
                echo get_opened_trigger($tname, $properties, $fold_url);
            } else {
                echo get_closed_detail($tname, $fold_url);
            }

            echo "</div>\n";
        }
    }

    echo '<form method="post" action="'.url_session($_SERVER['PHP_SELF'])."\" name=\"acc_trigger_form\">\n";

    if (count($s_triggers) > 0) {
        echo '<input type="submit" class="btn btn-default btn-xs" name="acc_trigger_reload" value="'.$button_strings['Reload']."\">&nbsp;&nbsp;&nbsp;\n";

        if (count($s_triggers) > 1) {
            echo '<input type="submit" class="btn btn-default btn-xs" name="acc_trigger_open" value="'.$button_strings['OpenAll']."\">&nbsp;&nbsp;&nbsp;\n";
            echo '<input type="submit"  class="btn btn-default btn-xs" name="acc_trigger_close" value="'.$button_strings['CloseAll']."\">\n";
        }
        echo "<br><br>\n";
    }
?>
<table>
<tr>
  <th colspan="2" align="left"><?php echo $acc_strings['CreateTrig']; ?></th>
  <td><input type="submit" class="btn btn-primary" name="acc_trigger_create" value="<?php echo $button_strings['Create']; ?>"></td>
</tr>
<tr>
  <td>
    <b><?php echo $acc_strings['SelTrigMod']; ?></b>
  </td>
  <td>
    <?php echo get_selectlist('acc_trigger_mod_name', array_keys($s_triggers), null, true); ?>
  </td>
  <td align="left">
    <input type="submit" class="btn btn-success" name="acc_trigger_mod" value="<?php echo $button_strings['Modify']; ?>">
  </td>
</tr>
<tr>
  <td>
    <b><?php echo $acc_strings['SelTrigDel']; ?></b>
  </td>
  <td>
    <?php echo get_selectlist('acc_trigger_del_name', array_keys($s_triggers), null, true); ?>
  </td>
  <td align="left">
    <input type="submit" class="btn btn-danger" name="acc_trigger_del" value="<?php echo $button_strings['Delete']; ?>">
  </td>
</tr>
</table>
</form>
<?php

endif;

?>
