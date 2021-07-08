<?php
/* Smarty version 3.1.39, created on 2021-07-08 18:40:47
  from '/home/povilasbrilius/.atom-projects/prestashop-gaming/admin284afokka/themes/default/template/modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60e71c7f51b2a3_54771188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3a7907cb740acfb388e3e92bcd93587acbdd730' => 
    array (
      0 => '/home/povilasbrilius/.atom-projects/prestashop-gaming/admin284afokka/themes/default/template/modal.tpl',
      1 => 1625756259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60e71c7f51b2a3_54771188 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal fade" id="<?php echo $_smarty_tpl->tpl_vars['modal_id']->value;?>
" tabindex="-1">
	<div class="modal-dialog <?php if ((isset($_smarty_tpl->tpl_vars['modal_class']->value))) {
echo $_smarty_tpl->tpl_vars['modal_class']->value;
}?>">
		<div class="modal-content">
			<?php if ((isset($_smarty_tpl->tpl_vars['modal_title']->value))) {?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['modal_title']->value;?>
</h4>
			</div>
			<?php }?>

			<?php echo $_smarty_tpl->tpl_vars['modal_content']->value;?>


			<?php if ((isset($_smarty_tpl->tpl_vars['modal_actions']->value))) {?>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</button>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modal_actions']->value, 'action');
$_smarty_tpl->tpl_vars['action']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->do_else = false;
?>
					<?php if ($_smarty_tpl->tpl_vars['action']->value['type'] == 'link') {?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
" class="btn <?php echo $_smarty_tpl->tpl_vars['action']->value['class'];?>
"><?php echo $_smarty_tpl->tpl_vars['action']->value['label'];?>
</a>
					<?php } elseif ($_smarty_tpl->tpl_vars['action']->value['type'] == 'button') {?>
						<button type="button" value="<?php echo $_smarty_tpl->tpl_vars['action']->value['value'];?>
" class="btn <?php echo $_smarty_tpl->tpl_vars['action']->value['class'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['action']->value['label'];?>

						</button>
					<?php }?>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<?php }
}
