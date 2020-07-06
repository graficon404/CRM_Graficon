<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
        <title>Graficon CRM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet"  href="<?php echo $_SESSION["scriptcase"]["menu"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet"  href="<?php echo $this->url_css; ?>Scriptcase7_BlueSky/Scriptcase7_BlueSky_menuMobile.css" />
        <script src="<?php echo $_SESSION["scriptcase"]["menu"]["glo_nm_path_prod"]; ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript">
            $(document).bind("mobileinit", function() {
                $.mobile.page.prototype.options.backBtnText = "<?php echo $this->Nm_lang["lang_btns_prev"]; ?>";
                $.mobile.page.prototype.options.addBackBtn = true;
            });
        </script>
        <script src="<?php echo $_SESSION["scriptcase"]["menu"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.js"></script>
    </head>
    <body>
   <TABLE width="100%" class="scMenuHHeader">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR align="center" valign="middle">
        <TD align="left" rowspan="2" class="scMenuHHeaderFont">
             <IMG SRC="<?php echo $path_imag_cab ?>/scriptcase__NM__scriptcase5_logo_simple.png" BORDER="0"/>
        </TD>
        <TD class="scMenuHHeaderFont">
          <?php echo "" ?>
        </TD>
       </TR>
       <TR align="right" valign="middle">
        <TD class="scMenuHHeaderFont">
          <?php echo $nm_data_fixa ?>
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE>
        <ul data-role='listview' data-theme='a'>
            <li title="<?php echo "" . $nm_var_hint[0] . ""; ?>">
                <a href="<?php echo "menu_form_php.php?sc_item_menu=item_4&sc_apl_menu=grid_caja&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[0] . ""; ?></a>
            </li>
            <li title="<?php echo "" . $nm_var_hint[1] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[1] . ""; ?></a>
                <ul>
                    <li title="<?php echo "" . $nm_var_hint[2] . ""; ?>">
                        <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[2] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[3] . ""; ?>">
                        <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[3] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[4] . ""; ?>">
                        <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[4] . ""; ?></a>
                    </li>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[5] . ""; ?>">
                <a href="<?php echo "menu_form_php.php?sc_item_menu=item_3&sc_apl_menu=grid_articulos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[5] . ""; ?></a>
            </li>
            <li title="<?php echo "" . $nm_var_hint[6] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[6] . ""; ?></a>
                <ul>
                    <li title="<?php echo "" . $nm_var_hint[7] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_15&sc_apl_menu=grid_clientes&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[7] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[8] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_16&sc_apl_menu=form_clientes_1&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[8] . ""; ?></a>
                    </li>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[9] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[9] . ""; ?></a>
                <ul>
                    <li title="<?php echo "" . $nm_var_hint[10] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_17&sc_apl_menu=grid_proveedores&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[10] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[11] . ""; ?>">
                        <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[11] . ""; ?></a>
                    </li>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[12] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[12] . ""; ?></a>
                <ul>
                    <li title="<?php echo "" . $nm_var_hint[13] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_27&sc_apl_menu=grid_vendedor&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[13] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[14] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_26&sc_apl_menu=grid_depositos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[14] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[15] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_rubro&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[15] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[16] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_situacion_iva&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[16] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[17] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_20&sc_apl_menu=grid_condicion_venta&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[17] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[18] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_formas_pago&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[18] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[19] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_25&sc_apl_menu=form_parametros&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[19] . ""; ?></a>
                    </li>
                    <li title="<?php echo "" . $nm_var_hint[20] . ""; ?>">
                        <a href="<?php echo "menu_form_php.php?sc_item_menu=item_24&sc_apl_menu=grid_documentos&sc_apl_link=" . urlencode($menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[20] . ""; ?></a>
                    </li>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[21] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[21] . ""; ?></a>
                <ul>
                    <li title="<?php echo "" . $nm_var_hint[22] . ""; ?>">
                        <a href="<?php echo "#"?>" target="_self"><?php echo "" . $nm_var_lab[22] . ""; ?></a>
                    </li>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[23] . ""; ?>">
                <a href="<?php echo "$saida_apl"?>" target="_parent"><?php echo "" . $nm_var_lab[23] . ""; ?></a>
            </li>
        </ul>

    </body>
</html>
