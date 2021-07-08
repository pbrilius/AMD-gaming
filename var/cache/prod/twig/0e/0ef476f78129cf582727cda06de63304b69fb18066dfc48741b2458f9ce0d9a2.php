<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__880198dd7b2018265ff007baf034c29be698843f82b4d11a77cb6fd10506a299 */
class __TwigTemplate_f984223cbdd5e859b2ea9a8bed126882734d97d93e4a157f28ec1b4a35f39f78 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"lt\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/img/app_icon.png\" />

<title>Modulių katalogas • Prestashop AMD gaming</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminModulesCatalog';
    var iso_user = 'lt';
    var lang_is_rtl = '0';
    var full_language_code = 'lt-lt';
    var full_cldr_language_code = 'lt-LT';
    var country_iso_code = 'LT';
    var _PS_VERSION_ = '1.7.7.5';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Parduotuvėje atliktas naujas užsakymas.';
    var order_number_msg = 'Užsakymo numeris: ';
    var total_msg = 'Viso: ';
    var from_msg = 'Nuo: ';
    var see_order_msg = 'Peržiūrėti šį užsakymą';
    var new_customer_msg = 'Parduotuvėje užsiregistravo naujas pirkėjas.';
    var customer_name_msg = 'Kliento vardas: ';
    var new_msg = 'Gauta nauja žinutė jūsų parduotuvėje.';
    var see_msg = 'Skaityti šią žinutę';
    var token = '792325a23b5894a3d94a4bc610e6d90f';
    var token_admin_orders = '7c494e1432bc86d4f81a97f53e4b838c';
    var token_admin_customers = '0e4f2471d3c407beb15cae8b51714821';
    var token_admin_customer_threads = '64bbd53b254c948744194b5249ba7d8f';
    var currentIndex = 'index.php?controller=AdminModulesCatalog';
    var employee_token = 'd90e837ecfc3af8d8bf76a8b923be3b8';
    var choose_language_translate = 'Pasirinkite kalbą:';
    var default_language = '1';
    var admin_modules_link = '/admin284afokka/index.php/improve/modules/catalog/recommended?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE';
    var admin_notification_get_link = '/admin284afokka/index.php/common/notifications?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE';
    var admin_notification_push_link = '/admin284afokka/index.php/common/notifications/ack?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE';
    var tab_modules_list = '';
    var update_success_msg = 'Atnaujinta';
    var errorLogin = 'PrestaShop nepavyko prisijungti prie Addons. Patikrinkite savo prisijungimo duomenis ir interneto ryšį.';
    var search_product_msg = 'Ieškoti prekės';
  </script>

      <link href=\"/admin284afokka/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin284afokka/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/gamification/views/css/gamification.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/welcome/public/module.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/admin284afokka\\/\";
var baseDir = \"\\/\";
var changeFormLanguageUrl = \"\\/admin284afokka\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\";
var currency = {\"iso_code\":\"EUR\",\"sign\":\"\\u20ac\",\"name\":\"Euras\",\"format\":null};
var currency_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"EUR\",\"currencySymbol\":\"\\u20ac\",\"numberSymbols\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.00\\u00a0\\u00a4\",\"negativePattern\":\"-#,##0.00\\u00a0\\u00a4\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var host_mode = false;
var number_specifications = {\"symbol\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"numberSymbols\":[\",\",\"\\u00a0\",\";\",\"%\",\"\\u2212\",\"+\",\"\\u00d710^\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var prestashop = {\"debug\":false};
var show_new_customers = \"1\";
var show_new_messages = false;
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/admin284afokka/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/js/admin.js?v=1.7.7.5\"></script>
<script type=\"text/javascript\" src=\"/admin284afokka/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/tools.js?v=1.7.7.5\"></script>
<script type=\"text/javascript\" src=\"/admin284afokka/public/bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/admin284afokka/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_mbo/views/js/recommended-modules.js?v=2.0.1\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>
<script type=\"text/javascript\" src=\"/modules/welcome/public/module.js\"></script>

  <script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/admin284afokka/index.php/common/notifications?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
<script>
            var admin_gamification_ajax_url = \"http:\\/\\/localhost:2020\\/admin284afokka\\/index.php?controller=AdminGamification&token=d6f2e796875f0f07e11290486f92136a\";
            var current_id_tab = 49;
        </script>

";
        // line 103
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>

<body
  class=\"lang-lt adminmodulescatalog\"
  data-base-url=\"/admin284afokka/index.php\"  data-token=\"l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\">

  <header id=\"header\" class=\"d-print-none\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminDashboard&amp;token=640c5258fe40b094f53370e827c3fc64\"></a>
      <span id=\"shop_version\">1.7.7.5</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Greita prieiga
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item\"
         href=\"http://localhost:2020/admin284afokka/index.php/improve/modules/manage?token=e5e120e4497da7cf795d253e8e837181\"
                 data-item=\"Įdiegti moduliai\"
      >Įdiegti moduliai</a>
          <a class=\"dropdown-item\"
         href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=b8f8cb09b08ac2e603bd00b9f05d6077\"
                 data-item=\"Katalogo vertinimas\"
      >Katalogo vertinimas</a>
          <a class=\"dropdown-item\"
         href=\"http://localhost:2020/admin284afokka/index.php/sell/catalog/categories/new?token=e5e120e4497da7cf795d253e8e837181\"
                 data-item=\"Nauja kategorija\"
      >Nauja kategorija</a>
          <a class=\"dropdown-item\"
         href=\"http://localhost:2020/admin284afokka/index.php/sell/catalog/products/new?token=e5e120e4497da7cf795d253e8e837181\"
                 data-item=\"Nauja prekė\"
      >Nauja prekė</a>
          <a class=\"dropdown-item\"
         href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=1b8894abd3450f2f62fe23e120e8d178\"
                 data-item=\"Naujas kuponas\"
      >Naujas kuponas</a>
          <a class=\"dropdown-item\"
         href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminOrders&amp;token=7c494e1432bc86d4f81a97f53e4b838c\"
                 data-item=\"Užsakymai\"
      >Užsakymai</a>
        <div class=\"dropdown-divider\"></div>
          <a
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"52\"
        data-icon=\"icon-AdminParentModulesCatalog\"
        data-method=\"add\"
        data-url=\"index.php/improve/modules/catalog?-smCD3oh17DsW_ZQr0G3LH1d488eE&&-smCD3oh17DsW_ZQr0G3LH1d488eE\"
        data-post-link=\"http://localhost:2020/admin284afokka/index.php?controller=AdminQuickAccesses&token=c515d7199f6a1d64e3b6b103c47ebcd0\"
        data-prompt-text=\"Įveskite pavadinimą šiai santrumpai:\"
        data-link=\"Modulių Katalogas -...\"
      >
        <i class=\"material-icons\">add_circle</i>
        Pridėti puslapį į greitą prieigą
      </a>
        <a class=\"dropdown-item\" href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminQuickAccesses&token=c515d7199f6a1d64e3b6b103c47ebcd0\">
      <i class=\"material-icons\">settings</i>
      Tvarkyti greitą prieigą
    </a>
  </div>
</div>
      </div>
      <div class=\"component\" id=\"header-search-container\">
        <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      action=\"/admin284afokka/index.php?controller=AdminSearch&amp;token=6451ad6a578487e61d73b1b6d7bf187f\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Paieška (pvz.: prekės kodas, kliento vardas...) d='Admin.Navigation.Header'\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Visur
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Visur\" href=\"#\" data-value=\"0\" data-placeholder=\"Ko jūs ieškote?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Visur</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Katalogas\" href=\"#\" data-value=\"1\" data-placeholder=\"Prekės pavadinimas, kodas, kt.\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Katalogas</a>
        <a class=\"dropdown-item\" data-item=\"Klientai pagal vardą\" href=\"#\" data-value=\"2\" data-placeholder=\"Pavadinimas\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Klientai pagal vardą</a>
        <a class=\"dropdown-item\" data-item=\"Klientai pagal IP adresą\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.80\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Klientai pagal IP adresą</a>
        <a class=\"dropdown-item\" data-item=\"Užsakymai\" href=\"#\" data-value=\"3\" data-placeholder=\"Užsakymo ID\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Užsakymai</a>
        <a class=\"dropdown-item\" data-item=\"Sąskaitos\" href=\"#\" data-value=\"4\" data-placeholder=\"Sąskaitos faktūros numeris\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Sąskaitos</a>
        <a class=\"dropdown-item\" data-item=\"Krepšeliai\" href=\"#\" data-value=\"5\" data-placeholder=\"Krepšelio ID\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Krepšeliai</a>
        <a class=\"dropdown-item\" data-item=\"Moduliai\" href=\"#\" data-value=\"7\" data-placeholder=\"Modulio pavadinimas\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Moduliai</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">PAIEŠKA</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
      </div>

      
      
      <div class=\"component\" id=\"header-shop-list-container\">
          <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"http://localhost:2020/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      Peržiūrėti parduotuvę
    </a>
  </div>
      </div>

              <div class=\"component header-right-component\" id=\"header-notifications-container\">
          <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Užsakymai<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Klientai<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Pranešimas<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų užsakymų nėra :(<br>
              Kaip apie kai kurias sezonines nuolaidas?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų klientų nėra :(<br>
              Ar šiomis dienomis aktyviai dalyvaujate socialiniuose tinkluose?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Šiuo metu naujų žinučių nėra.<br>
              Atrodo, kad jūsų klientai yra laimingi :)
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      nuo <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - registruotas <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
        </div>
      
      <div class=\"component\" id=\"header-employee-container\">
        <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      
      <span class=\"employee_avatar\"><img class=\"avatar rounded-circle\" src=\"http://profile.prestashop.com/pbrilius%40gmail.com.jpg\" /></span>
      <span class=\"employee_profile\">Sveiki sugrįžę Povilas</span>
      <a class=\"dropdown-item employee-link profile-link\" href=\"/admin284afokka/index.php/configure/advanced/employees/1/edit?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\">
      <i class=\"material-icons\">settings</i>
      Jūsų profilis
    </a>
    </div>
    
    <p class=\"divider\"></p>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/resources/documentations?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=resources-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">book</i> Ištekliai</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/training?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=training-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">school</i> Mokymai</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/experts?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=expert-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">person_pin_circle</i> Rasti ekspertą</a>
    <a class=\"dropdown-item\" href=\"https://addons.prestashop.com?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=addons-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">extension</i> PrestaShop prekyvietė</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/contact?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=help-center-en&amp;utm_content=download17\" target=\"_blank\"><i class=\"material-icons\">help</i> Pagalbos centras</a>
    <p class=\"divider\"></p>
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminLogin&amp;logout=1&amp;token=899b4aebddc051278945ae7cb3138d90\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Atsijungti</span>
    </a>
  </div>
</div>
      </div>
          </nav>
  </header>

  <nav class=\"nav-bar d-none d-print-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/admin284afokka/index.php/configure/advanced/employees/toggle-navigation?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\">
    <i class=\"material-icons\">chevron_left</i>
    <i class=\"material-icons\">chevron_left</i>
  </span>

  <div class=\"nav-bar-overflow\">
    <ul class=\"main-menu\">
              
                    
                    
          
            <li class=\"link-levelone \" data-submenu=\"1\" id=\"tab-AdminDashboard\">
              <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminDashboard&amp;token=640c5258fe40b094f53370e827c3fc64\" class=\"link\" >
                <i class=\"material-icons\">trending_up</i> <span>Skydelis</span>
              </a>
            </li>

          
                      
                                          
                    
          
            <li class=\"category-title \" data-submenu=\"2\" id=\"tab-SELL\">
                <span class=\"title\">Pardavimai</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                    <a href=\"/admin284afokka/index.php/sell/orders/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                      <span>
                      Užsakymai
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                                <a href=\"/admin284afokka/index.php/sell/orders/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Užsakymai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                                <a href=\"/admin284afokka/index.php/sell/orders/invoices/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Sąskaitos
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                                <a href=\"/admin284afokka/index.php/sell/orders/credit-slips/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Grąžinimo kvitai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                                <a href=\"/admin284afokka/index.php/sell/orders/delivery-slips/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Pristatymo kvitai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminCarts&amp;token=c038e59866c74b2c5b7bc979e0bdb972\" class=\"link\"> Prekių krepšeliai
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                    <a href=\"/admin284afokka/index.php/sell/catalog/products?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-store\">store</i>
                      <span>
                      Katalogas
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                                <a href=\"/admin284afokka/index.php/sell/catalog/products?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Prekės
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                                <a href=\"/admin284afokka/index.php/sell/catalog/categories?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Kategorijos
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                                <a href=\"/admin284afokka/index.php/sell/catalog/monitoring/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Kontrolė
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminAttributesGroups&amp;token=11c61b16eb7757aff6c3d844313b60d7\" class=\"link\"> Savybės ir ypatybės
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                                <a href=\"/admin284afokka/index.php/sell/catalog/brands/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Prekių ženklai ir tiekėjai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                                <a href=\"/admin284afokka/index.php/sell/attachments/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Failai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminCartRules&amp;token=1b8894abd3450f2f62fe23e120e8d178\" class=\"link\"> Nuolaidos
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                                <a href=\"/admin284afokka/index.php/sell/stocks/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Stocks
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                    <a href=\"/admin284afokka/index.php/sell/customers/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-account_circle\">account_circle</i>
                      <span>
                      Klientai
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                                <a href=\"/admin284afokka/index.php/sell/customers/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Klientai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                                <a href=\"/admin284afokka/index.php/sell/addresses/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Adresai
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                    <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminCustomerThreads&amp;token=64bbd53b254c948744194b5249ba7d8f\" class=\"link\">
                      <i class=\"material-icons mi-chat\">chat</i>
                      <span>
                      Klientų aptarnavimas
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminCustomerThreads&amp;token=64bbd53b254c948744194b5249ba7d8f\" class=\"link\"> Klientų aptarnavimas
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                                <a href=\"/admin284afokka/index.php/sell/customer-service/order-messages/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Užsakymo pranešimai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminReturn&amp;token=4ac94554acd88f0052bf1005ebd19a05\" class=\"link\"> Prekių grąžinimai
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                    <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminMetricsStats&amp;token=ea14d83b71de41ee53cbce8d0e13a7ee\" class=\"link\">
                      <i class=\"material-icons mi-assessment\">assessment</i>
                      <span>
                      Statistika
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-32\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"142\" id=\"subtab-AdminMetricsStats\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminMetricsStats&amp;token=ea14d83b71de41ee53cbce8d0e13a7ee\" class=\"link\"> PrestaShop Metrics
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"143\" id=\"subtab-AdminLegacyStatsMetrics\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminLegacyStatsMetrics&amp;token=a385393bf2ac441f407465517fbd520b\" class=\"link\"> Statistika
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                                            
          
                      
                                          
                    
          
            <li class=\"category-title -active\" data-submenu=\"42\" id=\"tab-IMPROVE\">
                <span class=\"title\">Pritaikymai</span>
            </li>

                              
                  
                                                      
                                                          
                  <li class=\"link-levelone has_submenu -active open ul-open\" data-submenu=\"43\" id=\"subtab-AdminParentModulesSf\">
                    <a href=\"/admin284afokka/index.php/improve/modules/manage?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Moduliai
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_up
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"44\" id=\"subtab-AdminModulesSf\">
                                <a href=\"/admin284afokka/index.php/improve/modules/manage?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Modulių valdymas
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo -active\" data-submenu=\"48\" id=\"subtab-AdminParentModulesCatalog\">
                                <a href=\"/admin284afokka/index.php/modules/addons/modules/catalog?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Modulių Katalogas
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"52\" id=\"subtab-AdminParentThemes\">
                    <a href=\"/admin284afokka/index.php/improve/design/themes/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                      <span>
                      Išvaizda
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-52\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"126\" id=\"subtab-AdminThemesParent\">
                                <a href=\"/admin284afokka/index.php/improve/design/themes/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Tema ir logotipas
                                </a>
                              </li>

                                                                                                                                        
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"136\" id=\"subtab-AdminPsMboTheme\">
                                <a href=\"/admin284afokka/index.php/modules/addons/themes/catalog?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Temos katalogas
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"55\" id=\"subtab-AdminParentMailTheme\">
                                <a href=\"/admin284afokka/index.php/improve/design/mail_theme/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> El. laiškų tema
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"57\" id=\"subtab-AdminCmsContent\">
                                <a href=\"/admin284afokka/index.php/improve/design/cms-pages/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Puslapiai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"58\" id=\"subtab-AdminModulesPositions\">
                                <a href=\"/admin284afokka/index.php/improve/design/modules/positions/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Pozicijos
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"59\" id=\"subtab-AdminImages\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminImages&amp;token=8ca124887e1c8d0f17d619df162a3e83\" class=\"link\"> Paveiksliukų nustatymai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"125\" id=\"subtab-AdminLinkWidget\">
                                <a href=\"/admin284afokka/index.php/modules/link-widget/list?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Link Widget
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"60\" id=\"subtab-AdminParentShipping\">
                    <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminCarriers&amp;token=0dedb2b8e773e07e2f9b1454d64049d6\" class=\"link\">
                      <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                      <span>
                      Pristatymas
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-60\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"61\" id=\"subtab-AdminCarriers\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminCarriers&amp;token=0dedb2b8e773e07e2f9b1454d64049d6\" class=\"link\"> Kurjeriai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"62\" id=\"subtab-AdminShipping\">
                                <a href=\"/admin284afokka/index.php/improve/shipping/preferences?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Nustatymai
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"63\" id=\"subtab-AdminParentPayment\">
                    <a href=\"/admin284afokka/index.php/improve/payment/payment_methods?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-payment\">payment</i>
                      <span>
                      Mokėjimas
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-63\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"64\" id=\"subtab-AdminPayment\">
                                <a href=\"/admin284afokka/index.php/improve/payment/payment_methods?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Mokėjimo būdai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"65\" id=\"subtab-AdminPaymentPreferences\">
                                <a href=\"/admin284afokka/index.php/improve/payment/preferences?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Nustatymai
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"66\" id=\"subtab-AdminInternational\">
                    <a href=\"/admin284afokka/index.php/improve/international/localization/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-language\">language</i>
                      <span>
                      Tarptautinis
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-66\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"67\" id=\"subtab-AdminParentLocalization\">
                                <a href=\"/admin284afokka/index.php/improve/international/localization/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Lokalizacija
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"72\" id=\"subtab-AdminParentCountries\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminZones&amp;token=2c202911d32b0c394e2ca135672f5079\" class=\"link\"> Vietovės
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"76\" id=\"subtab-AdminParentTaxes\">
                                <a href=\"/admin284afokka/index.php/improve/international/taxes/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Mokesčiai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"79\" id=\"subtab-AdminTranslations\">
                                <a href=\"/admin284afokka/index.php/improve/international/translations/settings?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Vertimai
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title \" data-submenu=\"80\" id=\"tab-CONFIGURE\">
                <span class=\"title\">Konfigūruoti</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"81\" id=\"subtab-ShopParameters\">
                    <a href=\"/admin284afokka/index.php/configure/shop/preferences/preferences?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-settings\">settings</i>
                      <span>
                      Parduotuvės nustatymai
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-81\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"82\" id=\"subtab-AdminParentPreferences\">
                                <a href=\"/admin284afokka/index.php/configure/shop/preferences/preferences?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Pagrindiniai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"85\" id=\"subtab-AdminParentOrderPreferences\">
                                <a href=\"/admin284afokka/index.php/configure/shop/order-preferences/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Užsakymų nustatymai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"88\" id=\"subtab-AdminPPreferences\">
                                <a href=\"/admin284afokka/index.php/configure/shop/product-preferences/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Prekės
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"89\" id=\"subtab-AdminParentCustomerPreferences\">
                                <a href=\"/admin284afokka/index.php/configure/shop/customer-preferences/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Klientų nustatymai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"93\" id=\"subtab-AdminParentStores\">
                                <a href=\"/admin284afokka/index.php/configure/shop/contacts/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Kontaktai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"96\" id=\"subtab-AdminParentMeta\">
                                <a href=\"/admin284afokka/index.php/configure/shop/seo-urls/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Duomenų srautas ir SEO
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"100\" id=\"subtab-AdminParentSearchConf\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminSearchConf&amp;token=8b2c2f00f6532742f50477aa8af56153\" class=\"link\"> Paieška
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"130\" id=\"subtab-AdminGamification\">
                                <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminGamification&amp;token=d6f2e796875f0f07e11290486f92136a\" class=\"link\"> Merchant Expertise
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"103\" id=\"subtab-AdminAdvancedParameters\">
                    <a href=\"/admin284afokka/index.php/configure/advanced/system-information/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\">
                      <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                      <span>
                      Išplėstiniai parametrai
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-103\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"104\" id=\"subtab-AdminInformation\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/system-information/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Informacija
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"105\" id=\"subtab-AdminPerformance\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/performance/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Našumas
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"106\" id=\"subtab-AdminAdminPreferences\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/administration/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Administracija
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"107\" id=\"subtab-AdminEmails\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/emails/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> El. paštas
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"108\" id=\"subtab-AdminImport\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/import/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Importuoti
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"109\" id=\"subtab-AdminParentEmployees\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/employees/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Darbuotojai
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"113\" id=\"subtab-AdminParentRequestSql\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/sql-requests/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Duomenų bazė
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"116\" id=\"subtab-AdminLogs\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/logs/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Įvykių žurnalas
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo \" data-submenu=\"117\" id=\"subtab-AdminWebservice\">
                                <a href=\"/admin284afokka/index.php/configure/advanced/webservice-keys/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" class=\"link\"> Webservice&#039;as
                                </a>
                              </li>

                                                                                                                                                                                          </ul>
                                        </li>
                              
          
                  </ul>
  </div>
  <div class=\"onboarding-navbar bootstrap\">
  <div class=\"row text\">
    <div class=\"col-md-8\">
      Pradėkite savo parduotuvę!
    </div>
    <div class=\"col-md-4 text-right text-md-right\">86%</div>
  </div>
  <div class=\"progress\">
    <div class=\"bar\" role=\"progressbar\" style=\"width:85.714285714286%;\"></div>
  </div>
  <div>
    <button class=\"btn btn-main btn-sm onboarding-button-resume\">Tęsti</button>
  </div>
  <div>
    <a class=\"btn -small btn-main btn-sm onboarding-button-stop\">Sustabdyti OnBoarding</a>
  </div>
</div>

</nav>

<div id=\"main-div\">
          
<div class=\"header-toolbar d-print-none\">
  <div class=\"container-fluid\">

    
      <nav aria-label=\"Breadcrumb\">
        <ol class=\"breadcrumb\">
                      <li class=\"breadcrumb-item\">Modulių Katalogas</li>
          
                  </ol>
      </nav>
    

    <div class=\"title-row\">
      
          <h1 class=\"title\">
            Modulių katalogas          </h1>
      

      
        <div class=\"toolbar-icons\">
          <div class=\"wrapper\">
            
                                                          <a
                  class=\"btn btn-primary  pointer\"                  id=\"page-header-desc-configuration-add_module\"
                  href=\"#\"                  title=\"Įkelti modulį\"                  data-toggle=\"pstooltip\"
                  data-placement=\"bottom\"                >
                  <i class=\"material-icons\">cloud_upload</i>                  Įkelti modulį
                </a>
                                                                        <a
                  class=\"btn btn-primary  pointer\"                  id=\"page-header-desc-configuration-addons_connect\"
                  href=\"#\"                  title=\"Prisijungti prie Addons prekyvietės\"                  data-toggle=\"pstooltip\"
                  data-placement=\"bottom\"                >
                  <i class=\"material-icons\">vpn_key</i>                  Prisijungti prie Addons prekyvietės
                </a>
                                      
            
                              <a class=\"btn btn-outline-secondary btn-help btn-sidebar\" href=\"#\"
                   title=\"Pagalba\"
                   data-toggle=\"sidebar\"
                   data-target=\"#right-sidebar\"
                   data-url=\"/admin284afokka/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop.com%252Flt%252Fdoc%252FAdminModules%253Fversion%253D1.7.7.5%2526country%253Dlt/Pagalba?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\"
                   id=\"product_form_open_help\"
                >
                  Pagalba
                </a>
                                    </div>
        </div>
      
    </div>
  </div>

  
      <div class=\"page-head-tabs\" id=\"head_tabs\">
      <ul class=\"nav nav-pills\">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <li class=\"nav-item\">
                    <a href=\"/admin284afokka/index.php/modules/addons/modules/catalog?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" id=\"subtab-AdminPsMboModule\" class=\"nav-link tab \" data-submenu=\"133\">
                      Modulių Katalogas
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                                              <li class=\"nav-item\">
                    <a href=\"/admin284afokka/index.php/modules/addons/modules/catalog/selection?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\" id=\"subtab-AdminPsMboAddons\" class=\"nav-link tab \" data-submenu=\"134\">
                      Module Selections
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          </ul>
    </div>
    <script>
  if (undefined !== mbo) {
    mbo.initialize({
      translations: {
        'Recommended Modules and Services': 'Rekomenduojami moduliai ir paslaugos',
        'Close': 'Uždaryti',
      },
      recommendedModulesUrl: '/admin284afokka/index.php/modules/addons/modules/recommended?tabClassName=AdminModulesCatalog&_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE',
      shouldAttachRecommendedModulesAfterContent: 0,
      shouldAttachRecommendedModulesButton: 0,
      shouldUseLegacyTheme: 0,
    });
  }
</script>

</div>
      
      <div class=\"content-div  with-tabs\">

        
<div class=\"onboarding-advancement\" style=\"display: none\">
  <div class=\"advancement-groups\">
          <div class=\"group group-0\" style=\"width: 7.1428571428571%;\">
        <div class=\"advancement\" style=\"width: 85.714285714286%;\"></div>
        <div class=\"id\">1</div>
      </div>
          <div class=\"group group-1\" style=\"width: 35.714285714286%;\">
        <div class=\"advancement\" style=\"width: 85.714285714286%;\"></div>
        <div class=\"id\">2</div>
      </div>
          <div class=\"group group-2\" style=\"width: 14.285714285714%;\">
        <div class=\"advancement\" style=\"width: 85.714285714286%;\"></div>
        <div class=\"id\">3</div>
      </div>
          <div class=\"group group-3\" style=\"width: 14.285714285714%;\">
        <div class=\"advancement\" style=\"width: 85.714285714286%;\"></div>
        <div class=\"id\">4</div>
      </div>
          <div class=\"group group-4\" style=\"width: 14.285714285714%;\">
        <div class=\"advancement\" style=\"width: 85.714285714286%;\"></div>
        <div class=\"id\">5</div>
      </div>
          <div class=\"group group-5\" style=\"width: 14.285714285714%;\">
        <div class=\"advancement\" style=\"width: 85.714285714286%;\"></div>
        <div class=\"id\">6</div>
      </div>
      </div>
  <div class=\"col-md-8\">
    <h4 class=\"group-title\"></h4>
    <div class=\"step-title step-title-1\"></div>
    <div class=\"step-title step-title-2\"></div>
  </div>
  <button class=\"btn btn-primary onboarding-button-next\">Tęsti</button>
  <a class=\"onboarding-button-shut-down\">Praleisti šį vadovą</a>
</div>

<script type=\"text/javascript\">

  var onBoarding;

  \$(function(){
    onBoarding = new OnBoarding(12, {\"groups\":[{\"steps\":[{\"type\":\"popup\",\"text\":\"<div class=\\\"onboarding-welcome\\\">\\n  <i class=\\\"material-icons onboarding-button-shut-down\\\">close<\\/i>\\n  <p class=\\\"welcome\\\">Sveiki atvyk\\u0119 \\u012f savo parudotuv\\u0119!<\\/p>\\n  <div class=\\\"content\\\">\\n    <p>Sveiki! Mano vardas Prestonas ir a\\u0161 esu \\u010dia, kad jums parodyti aplink\\u0105.<\\/p>\\n    <p>\\u012evykdykite kelis b\\u016btunis \\u017eingsnius prie\\u0161 prad\\u0117dami kurti parduotuv\\u0119:\\n    Sukurkite pirm\\u0105j\\u0105 prek\\u0119, personalizuokite parduotuv\\u0119, konfig\\u016bruokite pristatym\\u0105 ir mok\\u0117jimus...<\\/p>\\n  <\\/div>\\n  <div class=\\\"started\\\">\\n    <p>Prad\\u0117kime!<\\/p>\\n  <\\/div>\\n  <div class=\\\"buttons\\\">\\n    <button class=\\\"btn btn-tertiary-outline btn-lg onboarding-button-shut-down\\\">V\\u0117liau<\\/button>\\n    <button class=\\\"blue-balloon btn btn-primary btn-lg with-spinner onboarding-button-next\\\">Prad\\u0117ti<\\/button>\\n  <\\/div>\\n<\\/div>\\n\",\"options\":[\"savepoint\",\"hideFooter\"],\"page\":\"http:\\/\\/localhost:2020\\/admin284afokka\\/index.php?controller=AdminDashboard&token=640c5258fe40b094f53370e827c3fc64\"}]},{\"title\":\"Sukurkime pirm\\u0105sias j\\u016bs\\u0173 prekes\",\"subtitle\":{\"1\":\"K\\u0105 norite apie tai pasakyti? Pagalvokite, k\\u0105 klientai nor\\u0117t\\u0173 \\u017einoti.\",\"2\":\"Prid\\u0117ti ai\\u0161ki\\u0105 ir patraukli\\u0105 informacij\\u0105. Nesijaudinkite, j\\u016bs gal\\u0117site j\\u0105 redaguoti v\\u0117liau :)\"},\"steps\":[{\"type\":\"tooltip\",\"text\":\"Suteikite prekei ry\\u0161k\\u0173 pavadinim\\u0105.\",\"options\":[\"savepoint\"],\"page\":[\"\\/admin284afokka\\/index.php\\/sell\\/catalog\\/products\\/new?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\",\"admin284afokka\\/index.php\\/sell\\/catalog\\/products\\/.+\"],\"selector\":\"#form_step1_name_1\",\"position\":\"right\"},{\"type\":\"tooltip\",\"text\":\"U\\u017epildykite privalom\\u0105 informacij\\u0105 \\u0161iame skirtuke. Kiti skirtukai yra skirti papildomai informacijai.\",\"page\":\"admin284afokka\\/index.php\\/sell\\/catalog\\/products\\/.+\",\"selector\":\"#tab_step1\",\"position\":\"right\"},{\"type\":\"tooltip\",\"text\":\"Prid\\u0117kite vien\\u0105 ar daugiau nuotrauk\\u0173, kad j\\u016bs\\u0173 prek\\u0117 atrodyt\\u0173 vilojan\\u010diai!\",\"page\":\"admin284afokka\\/index.php\\/sell\\/catalog\\/products\\/.+\",\"selector\":\"#product-images-dropzone\",\"position\":\"right\"},{\"type\":\"tooltip\",\"text\":\"U\\u017e kiek planuoji tai parduoti?\",\"page\":\"admin284afokka\\/index.php\\/sell\\/catalog\\/products\\/.+\",\"selector\":\".right-column > .row > .col-md-12 > .form-group:nth-child(4) > .row > .col-md-6:first-child > .input-group\",\"position\":\"left\",\"action\":{\"selector\":\"#product_form_save_go_to_catalog_btn\",\"action\":\"click\"}},{\"type\":\"tooltip\",\"text\":\"Puiku! J\\u016bs k\\u0105 tik suk\\u016br\\u0117te pirm\\u0105j\\u0105 prek\\u0119. Atrodo gerai, ar ne?\",\"page\":\"admin284afokka\\/index.php\\/sell\\/catalog\\/products\",\"selector\":\"#product_catalog_list table tr:first-child td:nth-child(3)\",\"position\":\"left\"}]},{\"title\":\"Suteikite savo parduotuvei tapatumo\",\"subtitle\":{\"1\":\"Kaip norite, kad j\\u016bs\\u0173 parduotuv\\u0117 atrodyt\\u0173? Kas j\\u0105 daro toki\\u0105 ypating\\u0105?\",\"2\":\"Personalizuokite savo tem\\u0105 ar pasirinkite geriausi\\u0105 dizain\\u0105 i\\u0161 tem\\u0173 katalogo.\"},\"steps\":[{\"type\":\"tooltip\",\"text\":\"Geriausias kelias prad\\u0117ti yra prid\\u0117ti savo parduotuv\\u0117s logotip\\u0105 \\u010dia!\",\"options\":[\"savepoint\"],\"page\":\"\\/admin284afokka\\/index.php\\/improve\\/design\\/themes\\/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\",\"selector\":\"#form_shop_logos_header_logo\",\"position\":\"right\"},{\"type\":\"tooltip\",\"text\":\"Jei norite ka\\u017eko tikrai i\\u0161skirtinio, per\\u017ei\\u016br\\u0117kite tem\\u0173 katalog\\u0105!\",\"page\":\"\\/admin284afokka\\/index.php\\/improve\\/design\\/themes-catalog\\/?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\",\"selector\":\".addons-theme-one:first-child\",\"position\":\"right\"}]},{\"title\":\"Paruo\\u0161kite savo parduotuv\\u0119 mok\\u0117jimams\",\"subtitle\":{\"1\":\"Kaip norite, kad klientai jums mok\\u0117t\\u0173?\",\"2\":\"Pritaikykite savo pasi\\u016blymus savo rinkai: prid\\u0117kite populiariausius mok\\u0117jimo metodus klientams!\"},\"steps\":[{\"type\":\"tooltip\",\"text\":\"\\u0160ios apmok\\u0117jimo galimyb\\u0117s jau yra pasiekiamos j\\u016bs\\u0173 klientams.\",\"options\":[\"savepoint\"],\"page\":\"\\/admin284afokka\\/index.php\\/improve\\/payment\\/payment_methods?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\",\"selector\":\".modules_list_container_tab:first tr:first-child .text-muted, .card:eq(0) .text-muted:eq(0)\",\"position\":\"right\"},{\"type\":\"tooltip\",\"text\":\"Ir \\u010dia galite pasirinkti, kokius kitus mok\\u0117jimo b\\u016bdus prid\\u0117ti!\",\"page\":\"\\/admin284afokka\\/index.php\\/improve\\/payment\\/payment_methods?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\",\"selector\":\".panel:eq(1) table tr:eq(0) td:eq(1), .card:eq(1) .module-item-list div:eq(0) div:eq(1)\",\"position\":\"top\"}]},{\"title\":\"Pasirinkite pristatymo b\\u016bdus\",\"subtitle\":{\"1\":\"Kaip norite pristatyti savo prekes?\",\"2\":\"Pasirinkite j\\u016bs\\u0173 klientams tinkamiausius pristatymo b\\u016bdus! Sukurkite savo kurjer\\u012f arba prid\\u0117kite modul\\u012f.\"},\"steps\":[{\"type\":\"tooltip\",\"text\":\"\\u010cia pateikti \\u0161iuo metu j\\u016bs\\u0173 parduotuv\\u0117je naudojami pristatymo b\\u016bdai.\",\"options\":[\"savepoint\"],\"page\":\"http:\\/\\/localhost:2020\\/admin284afokka\\/index.php?controller=AdminCarriers&token=0dedb2b8e773e07e2f9b1454d64049d6\",\"selector\":\"#table-carrier tr:eq(2) td:eq(3)\",\"position\":\"right\"},{\"type\":\"tooltip\",\"text\":\"Galite pasi\\u016blyti daugiau pristatymo b\\u016bd\\u0173 sukurdami papildomus kurjerius\",\"page\":\"http:\\/\\/localhost:2020\\/admin284afokka\\/index.php?controller=AdminCarriers&token=0dedb2b8e773e07e2f9b1454d64049d6\",\"selector\":\".modules_list_container_tab tr:eq(0) .text-muted\",\"position\":\"right\"}]},{\"title\":\"Papildykite savo parduotuv\\u0119 moduliais\",\"subtitle\":{\"1\":\"Prid\\u0117kite nauj\\u0173 funkcij\\u0173 arba tvarkykite jau esan\\u010dius modulius.\",\"2\":\"Kai kurie moduliai jau yra \\u012fdiegti, kiti mobuliai gali b\\u016bti nemokami arba mokami - nar\\u0161ykite ir su\\u017einokite, kas pasiekiama!\"},\"steps\":[{\"type\":\"tooltip\",\"text\":\"Atraskite m\\u016bs\\u0173 moduli\\u0173 pasirinkimus pirmame skirtuke. Valdykite savo modulius antrame ir per\\u017ei\\u016br\\u0117kite prane\\u0161imus tre\\u010diame skirtuke.\",\"options\":[\"savepoint\"],\"page\":\"\\/admin284afokka\\/index.php\\/improve\\/modules\\/catalog?_token=l6hLr1zZ_6OcVk-smCD3oh17DsW_ZQr0G3LH1d488eE\",\"selector\":\".page-head-tabs .tab:eq(0)\",\"position\":\"right\"},{\"type\":\"popup\",\"text\":\"<div id=\\\"onboarding-welcome\\\" class=\\\"modal-body\\\">\\n    <div class=\\\"col-12\\\">\\n        <button class=\\\"onboarding-button-next pull-right close\\\" type=\\\"button\\\">&times;<\\/button>\\n        <h2 class=\\\"text-center text-md-center\\\">Tau!<\\/h2>\\n    <\\/div>\\n    <div class=\\\"col-12\\\">\\n        <p class=\\\"text-center text-md-center\\\">\\n          J\\u016bs per\\u017ei\\u016br\\u0117jote pagrindus, bet yra dar daug daugiau k\\u0105 i\\u0161bandyti.<br \\/>\\n          Kai kurie i\\u0161tekliai gali jums pad\\u0117ti eiti toliau:\\n        <\\/p>\\n        <div class=\\\"container-fluid\\\">\\n          <div class=\\\"row\\\">\\n            <div class=\\\"col-md-6  justify-content-center text-center text-md-center link-container\\\">\\n              <a class=\\\"final-link\\\" href=\\\"http:\\/\\/doc.prestashop.com\\/display\\/PS17\\/Getting+Started\\\" target=\\\"_blank\\\">\\n                <div class=\\\"starter-guide\\\"><\\/div>\\n                <span class=\\\"link\\\">Pradedan\\u010diojo gidas<\\/span>\\n              <\\/a>\\n            <\\/div>\\n            <div class=\\\"col-md-6 text-center text-md-center link-container\\\">\\n              <a class=\\\"final-link\\\" href=\\\"https:\\/\\/www.prestashop.com\\/forums\\/\\\" target=\\\"_blank\\\">\\n                <div class=\\\"forum\\\"><\\/div>\\n                <span class=\\\"link\\\">Forumas<\\/span>\\n              <\\/a>\\n            <\\/div>\\n          <\\/div>\\n          <div class=\\\"row\\\">\\n            <div class=\\\"col-md-6 text-center text-md-center link-container\\\">\\n              <a class=\\\"final-link\\\" href=\\\"https:\\/\\/www.prestashop.com\\/en\\/training-prestashop\\\" target=\\\"_blank\\\">\\n                <div class=\\\"training\\\"><\\/div>\\n                <span class=\\\"link\\\">Mokymai<\\/span>\\n              <\\/a>\\n            <\\/div>\\n            <div class=\\\"col-md-6 text-center text-md-center link-container\\\">\\n              <a class=\\\"final-link\\\" href=\\\"https:\\/\\/www.youtube.com\\/user\\/prestashop\\\" target=\\\"_blank\\\">\\n                <div class=\\\"video-tutorial\\\"><\\/div>\\n                <span class=\\\"link\\\">Video vadovas<\\/span>\\n              <\\/a>\\n            <\\/div>\\n          <\\/div>\\n        <\\/div>\\n    <\\/div>\\n    <div class=\\\"modal-footer\\\">\\n        <div class=\\\"col-12\\\">\\n            <div class=\\\"text-center text-md-center\\\">\\n                <button class=\\\"btn btn-primary onboarding-button-next\\\">A\\u0161 pasiruo\\u0161\\u0119s<\\/button>\\n            <\\/div>\\n        <\\/div>\\n    <\\/div>\\n<\\/div>\\n\",\"options\":[\"savepoint\",\"hideFooter\"],\"page\":\"admin284afokka\\/index.php\\/improve\\/modules\\/catalog\"}]}]}, 0, \"http://localhost:2020/admin284afokka/index.php?controller=AdminWelcome&token=cd5c5dcb8cbf3d5a44556e2f05835878\", baseAdminDir);

          onBoarding.addTemplate('lost', '<div class=\"onboarding onboarding-popup bootstrap\">  <div class=\"content\">    <p>Hey! Ar pasiklydai?</p>    <p>Norėdami tęsti, paspauskite čia:</p>    <div class=\"text-center\">      <button class=\"btn btn-primary onboarding-button-goto-current\">Tęsti</button>    </div>    <p>Jei norite sustabdyti mokymosi vadovą, paspauskite čia:</p>    <div class=\"text-center\">      <button class=\"btn btn-alert onboarding-button-stop\">Baigti mokymosi vadovą</button>    </div>  </div></div>');
          onBoarding.addTemplate('popup', '<div class=\"onboarding-popup bootstrap\">  <div class=\"content\"></div></div>');
          onBoarding.addTemplate('tooltip', '<div class=\"onboarding-tooltip\">  <div class=\"content\"></div>  <div class=\"onboarding-tooltipsteps\">    <div class=\"total\">žingsnis <span class=\"count\">1/5</span></div>    <div class=\"bulls\">    </div>  </div>  <button class=\"btn btn-primary btn-xs onboarding-button-next\">Tęsti</button></div>');
    
    onBoarding.showCurrentStep();

    var body = \$(\"body\");

    body.delegate(\".onboarding-button-next\", \"click\", function(){
      if (\$(this).is('.with-spinner')) {
        if (!\$(this).is('.animated')) {
          \$(this).addClass('animated');
          onBoarding.gotoNextStep();
        }
      } else {
        onBoarding.gotoNextStep();
      }
    }).delegate(\".onboarding-button-shut-down\", \"click\", function(){
      onBoarding.setShutDown(true);
    }).delegate(\".onboarding-button-resume\", \"click\", function(){
      onBoarding.setShutDown(false);
    }).delegate(\".onboarding-button-goto-current\", \"click\", function(){
      onBoarding.gotoLastSavePoint();
    }).delegate(\".onboarding-button-stop\", \"click\", function(){
      onBoarding.stop();
    });

  });

</script>


                                                        
        <div class=\"row \">
          <div class=\"col-sm-12\">
            <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>


  ";
        // line 1233
        $this->displayBlock('content_header', $context, $blocks);
        // line 1234
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1235
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1236
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1237
        echo "
            
          </div>
        </div>

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>O ne!</h1>
  <p class=\"mt-3\">
    Šio puslapio mobili versija šiuo metu negalima.
  </p>
  <p class=\"mt-2\">
    Norėdami matyti šį puslapį naudokite kompiuterį tol, kol jis bus pritaikytas mobiliems įrenginiams.
  </p>
  <p class=\"mt-2\">
    Ačiū.
  </p>
  <a href=\"http://localhost:2020/admin284afokka/index.php?controller=AdminDashboard&amp;token=640c5258fe40b094f53370e827c3fc64\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons\">arrow_back</i>
    Atgal
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    
</div>
  

      <div class=\"bootstrap\">
      <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"https://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-LT&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/lt/login?email=pbrilius%40gmail.com&amp;firstname=Povilas&amp;lastname=Brilius&amp;website=http%3A%2F%2Flocalhost%3A2020%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-LT&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/admin284afokka/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Prijunkite savo parduotuvę prie PrestaShop prekyvietės tam, kad galėtumėte automatiškai importuoti visus pirkimus iš Addons.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Neturite paskyros?</h4>
\t\t\t\t\t\t<p class='text-justify'>Atraskite PrestaShop Addons jėgą! Naršykite PrestaShop oficialioje prekyvietėje ir rinkitės tarp 3500 skirtingų modulių. Išsirinkite parduotuvės temą, pagerinkite konversijos santykį, padidinkite srautus, suteikite vartotojams lojalumo apdovanojimus ir pagerinkite produktyvumą</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Prisijungti prie PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link float-right _blank\" href=\"//addons.prestashop.com/lt/forgot-your-password\">Aš pamiršau savo slaptažodį</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/lt/login?email=pbrilius%40gmail.com&amp;firstname=Povilas&amp;lastname=Brilius&amp;website=http%3A%2F%2Flocalhost%3A2020%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-LT&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tSukurti paskyrą
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Prisijungti
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    </div>
  
";
        // line 1344
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
    }

    // line 103
    public function block_stylesheets($context, array $blocks = [])
    {
    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
    }

    // line 1233
    public function block_content_header($context, array $blocks = [])
    {
    }

    // line 1234
    public function block_content($context, array $blocks = [])
    {
    }

    // line 1235
    public function block_content_footer($context, array $blocks = [])
    {
    }

    // line 1236
    public function block_sidebar_right($context, array $blocks = [])
    {
    }

    // line 1344
    public function block_javascripts($context, array $blocks = [])
    {
    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "__string_template__880198dd7b2018265ff007baf034c29be698843f82b4d11a77cb6fd10506a299";
    }

    public function getDebugInfo()
    {
        return array (  1434 => 1344,  1429 => 1236,  1424 => 1235,  1419 => 1234,  1414 => 1233,  1405 => 103,  1397 => 1344,  1288 => 1237,  1285 => 1236,  1282 => 1235,  1279 => 1234,  1277 => 1233,  143 => 103,  39 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__880198dd7b2018265ff007baf034c29be698843f82b4d11a77cb6fd10506a299", "");
    }
}
