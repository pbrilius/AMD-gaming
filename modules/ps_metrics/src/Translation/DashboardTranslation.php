<?php

/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace PrestaShop\Module\Ps_metrics\Translation;

use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use Ps_metrics;

class DashboardTranslation
{
    /**
     * @var Ps_metrics
     */
    private $module;

    /**
     * @var PrestaShopContext
     */
    private $prestashopContext;

    /**
     * __construct
     *
     * @param Ps_metrics $module
     * @param PrestaShopContext $prestashopContext
     *
     * @return void
     */
    public function __construct(Ps_metrics $module, PrestaShopContext $prestashopContext)
    {
        $this->module = $module;
        $this->prestashopContext = $prestashopContext;
    }

    /**
     * Create all translations for Dashboard App
     *
     * @return array
     */
    public function getTranslations()
    {
        $locale = $this->prestashopContext->getLanguageIsoCode();

        $translations[$locale] = [
            'general' => [
                'title' => $this->module->l('PrestaShop Metrics', 'DashboardTranslation'),
                'trustData' => [
                    'text' => $this->module->l('Can I trust the data? Yes, you can!', 'DashboardTranslation'),
                    'link' => $this->module->l('See why', 'DashboardTranslation'),
                ],
                'openMetrics' => $this->module->l('Open Metrics', 'DashboardTranslation'),
                'textBeforeOpenMetrics' => $this->module->l('Consult the complete data of your store from the module.', 'DashboardTranslation'),
                'noData' => $this->module->l('No data available for now', 'DashboardTranslation'),
                'noTipsCard' => $this->module->l('No tips card available for now', 'DashboardTranslation'),
                'noLanguage' => $this->module->l('Looks like we can\'t reach our service right now. Please try again later or contact us if the issue persists.', 'DashboardTranslation'),
                'noActivity' => $this->module->l('You didn\'t get any activity during this period', 'DashboardTranslation'),
            ],
            'incentivePanel' => [
                'title' => $this->module->l('A new interface for your data', 'DashboardTranslation'),
                'gather' => $this->module->l('Gather all your data in one place.', 'DashboardTranslation'),
                'monitor' => $this->module->l('Follow the evolution of your business at a glance.', 'DashboardTranslation'),
                'decisions' => $this->module->l('Control and optimize your KPIs with 100% reliable data.', 'DashboardTranslation'),
                'link' => $this->module->l('Start the setup now', 'DashboardTranslation'),
            ],
            'needGAPanel' => [
                'textContent' => $this->module->l('In order to display sessions and conversion data, you need to configure your google analytics account.'),
                'configure' => $this->module->l('Configure', 'DashboardTranslation'),
            ],
            'dates' => [
                'yesterday' => $this->module->l('Yesterday', 'DashboardTranslation'),
                'last7Days' => $this->module->l('Last 7 days', 'DashboardTranslation'),
                'last30Days' => $this->module->l('Last 30 days', 'DashboardTranslation'),
                'selectOtherDates' => $this->module->l('Select other dates', 'DashboardTranslation'),
                'thismonth' => $this->module->l('This month', 'DashboardTranslation'),
                'lastmonth' => $this->module->l('Last month', 'DashboardTranslation'),
                'last90days' => $this->module->l('Last 90 days', 'DashboardTranslation'),
                'thisweek' => $this->module->l('This week', 'DashboardTranslation'),
                'lastweek' => $this->module->l('Last week', 'DashboardTranslation'),
                'currentPlans' => $this->module->l('Your current plan allows you to analyse data collected during the last 90 days', 'DashboardTranslation'),
                'today' => $this->module->l('Today', 'DashboardTranslation'),
                '7days' => $this->module->l('7 days', 'DashboardTranslation'),
                '30days' => $this->module->l('30 days', 'DashboardTranslation'),
                '3months' => $this->module->l('3 months', 'DashboardTranslation'),
                '6months' => $this->module->l('6 months', 'DashboardTranslation'),
                'to' => $this->module->l('to', 'DashboardTranslation'),
                'custom' => $this->module->l('Custom', 'DashboardTranslation'),
            ],
            'menu' => [
                'activity' => $this->module->l('Activity', 'DashboardTranslation'),
                'grow' => $this->module->l('Grow', 'DashboardTranslation'),
                'configure' => $this->module->l('Configure', 'DashboardTranslation'),
                'comparePreviousPeriod' => $this->module->l('Compare with previous period', 'DashboardTranslation'),
                'overview' => $this->module->l('Overview', 'DashboardTranslation'),
                'business' => $this->module->l('Business', 'DashboardTranslation'),
                'acquisition' => $this->module->l('Acquisition', 'DashboardTranslation'),
                'customerKnowledge' => $this->module->l('Customer Knowledge', 'DashboardTranslation'),
            ],
            'tabsTitle' => [
                'source' => $this->module->l('source | sources', 'DashboardTranslation'),
                'noSource' => $this->module->l('No source', 'DashboardTranslation'),
                'revenues' => $this->module->l('revenue | revenues', 'DashboardTranslation'),
                'revenuesTooltip' => $this->module->l('Sum of revenue, tax + shipping incl., generated within the date range by the orders considered as validated.', 'DashboardTranslation'),
                'orders' => $this->module->l('order | orders', 'DashboardTranslation'),
                'ordersTooltip' => $this->module->l('Total number of orders received within the date range by the orders considered as validated.', 'DashboardTranslation'),
                'visits' => $this->module->l('session | sessions', 'DashboardTranslation'),
                'visitsTooltip' => $this->module->l('Total number of sessions on your store within the date range when one or several pages have been loaded by a user.', 'DashboardTranslation'),
                'visitors' => $this->module->l('User | Users', 'DashboardTranslation'),
                'visitorsTooltip' => $this->module->l('Total distinct users who have visited one or several pages on your store at least once within the date range.', 'DashboardTranslation'),
                'conversionRate' => $this->module->l('conversion rate | conversion rate', 'DashboardTranslation'),
                'conversionRateTooltip' => $this->module->l('Percentage of sessions that resulted in orders, out of the total number of sessions, within the date range.', 'DashboardTranslation'),
                'basedOn' => $this->module->l('based on user | based on users', 'DashboardTranslation'),
                'basedOnTooltip' => $this->module->l('Percentage of users who completed an order, out of the total number of users, within the date range.', 'DashboardTranslation'),
                'sourceRatio' => $this->module->l('Ratio orders/sessions', 'DashboardTranslation'),
            ],
            'tabsBody' => [
                'general' => [
                    'titleInsights_revenue' => $this->module->l('Tips to grow your revenue', 'DashboardTranslation'),
                    'titleInsights_orders' => $this->module->l('Tips to increase your orders', 'DashboardTranslation'),
                    'titleInsights_sessions' => $this->module->l('Tips to drive more sessions', 'DashboardTranslation'),
                    'titleInsights_conversion_rate' => $this->module->l('Tips to improve your conversion rate', 'DashboardTranslation'),
                    'discoverAllInsights' => $this->module->l('Discover more insights', 'DashboardTranslation'),
                    'seeMoreFeatures' => $this->module->l('See more features', 'DashboardTranslation'),
                    'close' => $this->module->l('Close', 'DashboardTranslation'),
                ],
                'dates' => [
                    'hour' => $this->module->l('Hour', 'DashboardTranslation'),
                    'day' => $this->module->l('Day', 'DashboardTranslation'),
                    'week' => $this->module->l('Week', 'DashboardTranslation'),
                    'month' => $this->module->l('Month', 'DashboardTranslation'),
                ],
                'comparePanel' => [
                    'compareWith' => $this->module->l('Compare with', 'DashboardTranslation'),
                    'previousPeriod' => $this->module->l('Previous period', 'DashboardTranslation'),
                    'lastYear' => $this->module->l('Last year', 'DashboardTranslation'),
                    'soon' => $this->module->l('Soon', 'DashboardTranslation'),
                ],
                'revenues' => [
                    'revenuePerCategory' => $this->module->l('Revenue per category', 'DashboardTranslation'),
                    'revenuePerCategoryTooltip' => $this->module->l('Sum of revenue, tax + shipping incl., generated within the date range by the orders considered as validated.', 'DashboardTranslation'),
                    'revenueAnalysis' => $this->module->l('Revenue Analysis', 'DashboardTranslation'),
                    'revenueAnalysisTooltip' => $this->module->l('Sum of tax generated within the date range by the orders considered as validated', 'DasboardTranslation'),
                    'revenueNet' => $this->module->l('NET REVENUE', 'DashboardTranslation'),
                    'totalTaxes' => $this->module->l('TOTAL TAX', 'DashboardTranslation'),
                ],
                'orders' => [
                    'cartAnalysis' => $this->module->l('Cart Analysis', 'DashboardTranslation'),
                    'cartValueAverage' => $this->module->l('AVERAGE ORDER VALUE', 'DashboardTranslation'),
                    'cartValueAverageTooltip' => $this->module->l(' Average value of the orders received within the date range, calculated by dividing Revenue by Orders.', 'DashboardTranslation'),
                    'abandonedCartRate' => $this->module->l('CART ABANDONMENT RATE', 'DashboardTranslation'),
                    'abandonedCartRateTooltip' => $this->module->l('Percentage of shopping carts created by a user and abandoned before completing the purchase.', 'DashboardTranslation'),
                    'seeDetails' => $this->module->l('See details', 'DashboardTranslation'),
                ],
                'visits' => [
                    'trafficPerChannel' => $this->module->l('Traffic per channel', 'DashboardTranslation'),
                    'direct' => $this->module->l('The traffic to your website got from direct access, for example by typing your URL in the browser address bar or via a bookmark.', 'DashboardTranslation'),
                    'referral' => $this->module->l('The traffic to your website got from a backlink on another website', 'DashboardTranslation'),
                    'organic_search' => $this->module->l('The traffic your website got for free from search engines, like Google, Bing, etc.', 'DashboardTranslation'),
                    'paid_search' => $this->module->l('The paid traffic your website got from search engines, like Google from Google Ads', 'DashboardTranslation'),
                    'email' => $this->module->l('The traffic your website got from email marketing campaigns and even email signatures', 'DashboardTranslation'),
                    'social' => $this->module->l('The traffic your website got from social media like Facebook, Twitter, Linkedin, etc.', 'DashboardTranslation'),
                    'display' => $this->module->l('The traffic your website got from display ads on another website', 'DashboardTranslation'),
                    'other' => $this->module->l('The traffic your website got from other channels that could not be identified', 'DashboardTranslation'),
                    'visitAnalysis' => $this->module->l('Visits Analysis', 'DashboardTranslation'),
                    'bounceRate' => $this->module->l('BOUNCE RATE', 'DashboardTranslation'),
                    'averageSessionDuration' => $this->module->l('AVERAGE SESSION DURATION', 'DashboardTranslation'),
                ],
                'conversionRate' => [
                    'loyaltyAnalysis' => $this->module->l('Loyalty analysis', 'DashboardTranslation'),
                    'loyaltyAnalysisTooltip' => $this->module->l('New customers / Customers who already have completed an order on your store before', 'DashboardTranslation'),
                    'repeatCustomers' => $this->module->l('Repeat customers', 'DashboardTranslation'),
                    'newCustomers' => $this->module->l('New customers', 'DashboardTranslation'),
                    'customers_with_orders' => $this->module->l('Repeat customers', 'DashboardTranslation'),
                    'customers_without_orders' => $this->module->l('New customers', 'DashboardTranslation'),
                    'paymentMethods' => $this->module->l('Payment methods', 'DashboardTranslation'),
                    'customer_with_orders_text' => $this->module->l('{valueCustomers}{typeValueCustomers} of your customers are returning customers, they represent {valueRevenues}{typeValueRevenues} of your revenue over the period.', 'DashboardTranslation'),
                    'customer_without_orders_text' => $this->module->l('{valueCustomers}{typeValueCustomers} of your customers are new customers, they represent {valueRevenues}{typeValueRevenues} of your revenue over the period.', 'DashboardTranslation'),
                ],
                'nextFeatures' => [
                    'comingSoon' => $this->module->l('Coming Soon', 'DashboardTranslation'),
                    'tellMeMore' => $this->module->l('Tell me more', 'DashboardTranslation'),
                    'getNotified' => $this->module->l('Receive weekly reportings by email', 'DashboardTranslation'),
                    'getNotifiedModal' => $this->module->l('Keep always up to speed with your last week\'s performance! Our weekly reporting allows you to get a comprehensive, good-looking and insightful report on your activity. Delivered every Monday, right to your inbox.', 'DashboardTranslation'),
                    'exportData' => $this->module->l('Export your data to CSV and PDF files', 'DashboardTranslation'),
                    'exportDataModal' => $this->module->l('Easily export and share your data. Export your data to a .csv file covering all your KPIs within the selected date range and granularity.  Or download your instant .pdf report, ready to share with your team.', 'DashboardTranslation'),
                    'analyseLast15Months' => $this->module->l('Go further with 14 months of data history', 'DashboardTranslation'),
                    'analyseLast15MonthsModal' => $this->module->l('Unlock the power of your data with a 14 months data history. Analyze your performance over more than one year. Combined with our new comparison mode, you will be able to get a year-over-year analysis very easily.', 'DashboardTranslation'),
                    'upcomingFeatures' => $this->module->l('Upcoming features', 'DashboardTranslation'),
                ],
            ],
            'grow' => [
                'title' => $this->module->l('Grow your business', 'DashboardTranslation'),
                'baseline1' => $this->module->l('Let\'s go further together.', 'DashboardTranslation'),
                'baseline2' => $this->module->l('Get some insights and tips to grow your business!', 'DashboardTranslation'),
                'removeFilter' => $this->module->l('Remove filter', 'DashboardTranslation'),
                'filterSelected' => $this->module->l('filter selected', 'DashboardTranslation'),
                'noFilterSelected' => $this->module->l('Select a tag to filter the tips', 'DashboardTranslation'),
                'readMore' => $this->module->l('Read more', 'DashboardTranslation'),
                'modal' => [
                    'close' => $this->module->l('Close', 'DashboardTranslation'),
                    'visitBlog' => $this->module->l('MORE INFORMATION', 'DashboardTranslation'),
                ],
                'buttons' => [
                    'revenue' => $this->module->l('Revenue', 'DashboardTranslation'),
                    'conversion' => $this->module->l('Conversion', 'DashboardTranslation'),
                    'orders' => $this->module->l('Orders', 'DashboardTranslation'),
                    'sessions' => $this->module->l('Sessions', 'DashboardTranslation'),
                ],
            ],
            'alerts' => [
                'disableDashboardModules' => [
                    'text' => $this->module->l('Default PrestaShop statistics blocks are enabled. You can disable them to avoid overloading your dashboard', 'DashboardTranslation'),
                    'cta' => $this->module->l('Click here if you want to disable them', 'DashboardTranslation'),
                ],
                'enableDashboardModules' => [
                    'text' => $this->module->l('Your previous statistics blocks have been disabled to avoid overloading your dashboard', 'DashboardTranslation'),
                    'cta' => $this->module->l('Click here if you want to reactivate', 'DashboardTranslation'),
                ],
            ],
            'tabs' => [
                'overviewTitle' => $this->module->l('Summary', 'DashboardTranslation'),
                'highlights' => $this->module->l('Highlights', 'DashboardTranslation'),
                'report' => $this->module->l('Reports', 'DashboardTranslation'),
            ],
            'graph' => [
                'ordersEvolution' => $this->module->l('Orders Evolution', 'DashboardTranslation'),
                'top10Products' => $this->module->l('Top 10 products ordered', 'DashboardTranslation'),
                'salesEvolution' => $this->module->l('Sales evolution', 'DashboardTranslation'),
                'sessionsEvolution' => $this->module->l('Sessions evolution', 'DashboardTranslation'),
                'lastPeriod' => $this->module->l('Previous period', 'DashboardTranslation'),
                'currentPeriod' => $this->module->l('Current period', 'DashboardTranslation'),
                'grossRevenueDistribution' => $this->module->l('Gross Sales Revenue', 'DashboardTranslation'),
                'grossRevenueDistributionTooltip' => $this->module->l('This chart shows the detailed composition of the Gross Sales Revenue over the period.', 'DashboardTranslation'),
                'trafficDistribution' => $this->module->l('Traffic distribution', 'DashboardTranslation'),
                'customerDistribution' => $this->module->l('Customer distribution', 'DashboardTranslation'),
                'averageCartEvolution' => $this->module->l('Average cart value evolution', 'DashboardTranslation'),
                'ordersEvolutionTooltip' => $this->module->l('This graph shows the orders evolution over both the current period and the previous one, if the comparison mode is activated.', 'DashboardTranslation'),
                'salesEvolutionTooltip' => $this->module->l('This graph shows the sales evolution over both the current period and the previous one, if the comparison mode is activated.', 'DashboardTranslation'),
                'sessionsEvolutionTooltip' => $this->module->l('This graph shows the sessions evolution over both the current period and the previous one, if the comparison mode is activated.', 'DashboardTranslation'),
                'trafficDistributionTooltip' => $this->module->l('This chart shows the detailed composition of the global traffic on your website over the period.', 'DashboardTranslation'),
                'customerDistributionTooltip' => $this->module->l('This chart shows the detailed composition of the global customer over the period.', 'DashboardTranslation'),
                'averageCartEvolutionTooltip' => $this->module->l('This graph shows the cart average value evolution over both the current period and the previous one, if the comparison mode is activated.', 'DashboardTranslation'),
                'legend' => [
                    'revenuenet' => $this->module->l('Net revenue', 'DashboardTranslation'),
                    'new_customer' => $this->module->l('New customer', 'DashboardTranslation'),
                    'returning_customer' => $this->module->l('Returning customer', 'DashboardTranslation'),
                    'tax' => $this->module->l('Tax', 'DashboardTranslation'),
                    'refund' => $this->module->l('Refund', 'DashboardTranslation'),
                    'shipping' => $this->module->l('Shipping', 'DashboardTranslation'),
                    'Direct' => $this->module->l('Direct', 'DashboardTranslation'),
                    'Social' => $this->module->l('Social', 'DashboardTranslation'),
                    'Email' => $this->module->l('Email', 'DashboardTranslation'),
                    'Affiliates' => $this->module->l('Affiliates', 'DashboardTranslation'),
                    'Referral' => $this->module->l('Referral', 'DashboardTranslation'),
                    'Display' => $this->module->l('Display', 'DashboardTranslation'),
                    'Other' => $this->module->l('Other', 'DashboardTranslation'),
                    'Organic_Search' => $this->module->l('Organic Search', 'DashboardTranslation'),
                    'Paid_Search' => $this->module->l('Paid Search', 'DashboardTranslation'),
                    'Other_Advertising' => $this->module->l('Other Advertising', 'DashboardTranslation'),
                    'week' => $this->module->l('Week', 'DashboardTranslation'),
                ],
            ],
            'highlight' => [
                'repeatCustomer' => $this->module->l('The share of returning customers has {highlight} by {value}{symbol} compared to the previous period.', 'DashboardTranslation'),
                'averageCart' => $this->module->l('The average cart value has {highlight} by {value}{symbol} compared to the previous period.', 'DashboardTranslation'),
                'topProduct' => $this->module->l('The top-selling product over the period is {product}. It generated {value}{symbol}', 'DashboardTranslation'),
                'topCategory' => $this->module->l('The top-selling category over the period is {product}. It generated {value}{symbol}', 'DashboardTranslation'),
                'topSourceTraffic' => $this->module->l('The most performant acquisition channel is {product}. It drove {value}{symbol} of the sessions over the period.', 'DashboardTranslation'),
                'increased' => $this->module->l('increased', 'DashboardTranslation'),
                'decreased' => $this->module->l('decreased', 'DashboardTranslation'),
            ],
            'boxNumber' => [
                'revenueGross' => $this->module->l('Gross Revenue', 'DashboardTranslation'),
                'revenueGrossTooltip' => $this->module->l('The Gross Revenue is the total amount of sales recognized for the selected period, prior to any deductions.', 'DashboardTranslation'),
                'orderSum' => $this->module->l('Orders', 'DashboardTranslation'),
                'orderSumTooltip' => $this->module->l('Total number of orders received within the date range by the orders considered as validated.', 'DashboardTranslation'),
                'orderAverage' => $this->module->l('Average cart value', 'DashboardTranslation'),
                'orderAverageTooltip' => $this->module->l('The Average Cart Value is the average amount spent by a customer per transaction on your store.', 'DashboardTranslation'),
                'cartAbandonedRate' => $this->module->l('Cart abandonment rate', 'DashboardTranslation'),
                'cartAbandonedRateTooltip' => $this->module->l('The Shopping Cart Abandonment Rate is the percentage of online shoppers who add items to a virtual shopping cart but then abandon it before completing the purchase.', 'DashboardTranslation'),
                'conversionRate' => $this->module->l('Conversion rate', 'DashboardTranslation'),
                'conversionRateTooltip' => $this->module->l('Percentage of sessions that resulted in orders, out of the total number of sessions, within the date range.', 'DashboardTranslation'),
                'uniqueSession' => $this->module->l('Unique sessions', 'DashboardTranslation'),
                'uniqueSessionTooltip' => $this->module->l('Total number of sessions on your store within the date range when one or several pages have been loaded by a user.', 'DashboardTranslation'),
                'bounceRate' => $this->module->l('Bounce rate', 'DashboardTranslation'),
                'bounceRateTooltip' => $this->module->l('The Bounce Rate represents the percentage of visitors who enter your website and leave directly without viewing any other pages.', 'DashboardTranslation'),
                'averageSessionDuration' => $this->module->l('Average session duration', 'DashboardTranslation'),
                'averageSessionDurationTooltip' => $this->module->l('The Average session duration is a metric that measures the average length of sessions on your website.', 'DashboardTranslation'),
                'sessions' => $this->module->l('Sessions', 'DashboardTranslation'),
                'sessionsTooltip' => $this->module->l('Total number of sessions on your store within the date range when one or several pages have been loaded by a user.', 'DashboardTranslation'),
                'uniqueVisits' => $this->module->l('Unique visitors', 'DashboardTranslation'),
                'uniqueVisitsTooltip' => $this->module->l('Total distinct users who have visited one or several pages on your store at least once within the date range.', 'DashboardTranslation'),
                'averageCartValue' => $this->module->l('Average cart value', 'DashboardTranslation'),
                'averageCartValueTooltip' => $this->module->l('The Average Cart Value is the average amount spent by a customer per transaction on your store.', 'DashboardTranslation'),
                'higher' => $this->module->l('higher', 'DashboardTranslation'),
                'lower' => $this->module->l('lower', 'DashboardTranslation'),
                'thanLastPeriod' => $this->module->l('than previous period', 'DashboardTranslation'),
            ],
            'error' => [
                'sentence' => $this->module->l('Something went wrong :(', 'DashboardTranslation'),
                'button' => $this->module->l('Try again', 'DashboardTranslation'),
                'analyticsSentence' => $this->module->l('You must {linktext} account.', 'DashboardTranslation'),
                'analyticsSentenceLink' => $this->module->l('configure a Google Analytics', 'DashboardTranslation'),
            ],
            'boxalert' => [
                'title' => $this->module->l('Something went wrong', 'DashboardTranslation'),
                'text' => $this->module->l('It looks like your hosting configuration could be the issue ({typeerror}).Please {linktext} to know more.', 'DashboardTranslation'),
                'link' => $this->module->l('read the FAQ', 'DashboardTranslation'),
                'maxUserConnections' => $this->module->l('max_user_connections', 'DashboardTranslation'),
            ],
            'nodata' => [
                'sentence' => $this->module->l('You don\'t have any data for this KPI ', 'DashboardTranslation'),
                'noTipscard' => $this->module->l('You don\'t have any tips ', 'DashboardTranslation'),
            ],
            'business' => [
                'top10' => [
                    'tippy' => [
                        'product' => $this->module->l('Name of product', 'DashboardTranslation'),
                        'orders' => $this->module->l('Quantity', 'DashboardTranslation'),
                    ],
                    'product' => $this->module->l('Product', 'DashboardTranslation'),
                    'orders' => $this->module->l('Qty', 'DashboardTranslation'),
                    'amount' => $this->module->l('Amount', 'DashboardTranslation'),
                ],
            ],
            'advancedPlan' => [
                'advancedPlan' => $this->module->l('Advanced plan', 'DashboardTranslation'),
                'upgrade' => [
                    'modalTitle' => $this->module->l('This tab is only available with the Advanced plan.', 'DashboardTranslation'),
                    'modalTitleUpgrade' => $this->module->l('Upgrade your plan', 'DashboardTranslation'),
                    'header' => $this->module->l('Subscribe to Advanced Plan', 'DashboardTranslation'),
                    'listitem' => [
                        '1' => $this->module->l('14 months of data history', 'DashboardTranslation'),
                        '2' => $this->module->l('Your data of the current day', 'DashboardTranslation'),
                        '3' => $this->module->l('Access to all tabs', 'DashboardTranslation'),
                    ],
                    'footer' => $this->module->l('Unlock the full potential of your store using Metrics Advanced with no impact on your performance.', 'DashboardTranslation'),
                    'button' => $this->module->l('Upgrade plan', 'DashboardTranslation'),
                ],
                'upgradeModal' => [
                    'modalTitleUpgrade' => $this->module->l('Subscribe to Advanced Plan', 'DashboardTranslation'),
                    'header' => $this->module->l('Unlock the following features:', 'DashboardTranslation'),
                    'listitem' => [
                        '1' => $this->module->l('14 months of historical data available', 'DashboardTranslation'),
                        '2' => $this->module->l('Highlights and detailed metrics on 3 key dimensions of your e-commerce: Business, Acquisition, Customer Knowledge', 'DashboardTranslation'),
                        '3' => $this->module->l('Your data of the current day on the Overview', 'DashboardTranslation'),
                    ],
                    'footer' => $this->module->l('By subscribing to the Advanced plan, your data is synchronized on a fast and secure cloud server to maintain the performance of your store while giving you more depth and insights for your analysis.', 'DashboardTranslation'),
                    'button' => $this->module->l('Upgrade plan', 'DashboardTranslation'),
                ],
                'menuTooltipTodayNotAccessible' => $this->module->l('This period is only available on your overview', 'DashboardTranslation'),
                'menuTooltipMenuOnTodayNotAccessible' => $this->module->l('For now, ‘Today’ view is only available on the Overview tab. Please select another period of analysis to display your data.', 'DashboardTranslation'),
                'menuTooltipLock' => $this->module->l('This period is only available with the Advanced plan', 'DashboardTranslation'),
                'menuTooltipWait' => $this->module->l('This period will be available after synchronization', 'DashboardTranslation'),
                'sync' => [
                    'statusTitle' => $this->module->l('Synchronization status', 'DashboardTranslation'),
                    'statusTooltip' => $this->module->l('Your data is frequently synchronised to maintain your store performance.', 'DashboardTranslation'),
                    'lastSync' => $this->module->l('Last synchronization', 'DashboardTranslation'),
                    'scheduled' => $this->module->l('Synchronization scheduled', 'DashboardTranslation'),
                    'syncing' => $this->module->l('Synchronization in progress', 'DashboardTranslation'),
                    'done' => $this->module->l('Synchronization done !', 'DashboardTranslation'),
                    'nextSync' => $this->module->l('Next:', 'DashboardTranslation'),
                    'sentence1' => $this->module->l('Not seeing your data ?', 'DashboardTranslation'),
                    'sentence2' => $this->module->l('Synchronization can take up to a few hours', 'DashboardTranslation'),
                ],
            ],
            'menuDropdown' => [
                'fullscreen' => $this->module->l('Full screen', 'DashboardTranslation'),
                'settings' => $this->module->l('Settings', 'DashboardTranslation'),
                'faq' => $this->module->l('Tutorial', 'DashboardTranslation'),
            ],
            'tipscards' => [
                'boxTitle' => $this->module->l('Tips', 'DashboardTranslation'),
                'noTipscard' => $this->module->l('No tipscard', 'DashboardTranslation'),
                'showModuleButton' => $this->module->l('See the module', 'DashboardTranslation'),
                'viewTip' => $this->module->l('View tip', 'DashboardTranslation'),
            ],
            'nextfeatures' => [
                'title' => $this->module->l('Help us shape the future!', 'DashboardTranslation'),
                'comingSoon' => $this->module->l('Interested in those features?', 'DashboardTranslation'),
                'weekly' => $this->module->l('Reportings', 'DashboardTranslation'),
                'export' => $this->module->l('Data exporting', 'DashboardTranslation'),
                'newKpi' => $this->module->l('Additional KPIs', 'DashboardTranslation'),
                'feedbackButton' => $this->module->l('Give feedback', 'DashboardTranslation'),
            ],
            'newversionavailable' => [
                'title' => $this->module->l('New version available !', 'DashboardTranslation'),
                'description' => $this->module->l('Update your module for additional insights and build a complete picture!', 'DashboardTranslation'),
                'button' => $this->module->l('Update module', 'DashboardTranslation'),
            ],
            'moduleUpgraded' => [
                'title' => $this->module->l('Module upgraded to version', 'DashboardTranslation'),
            ],
            'compareMode' => [
                'title' => $this->module->l('Compare with previous period', 'DashboardTranslation'),
                'tooltip' => $this->module->l('Compare with previous period', 'DashboardTranslation'),
                'dateRangeError' => $this->module->l('Date range too large', 'DashboardTranslation'),
            ],
            'tour' => [
                'noTourForPlanAvailable' => $this->module->l('No tour available for plan {plan} !', 'DashboardTranslation'),
                'closeButton' => $this->module->l('X Close', 'DashboardTranslation'),
                'nextButton' => $this->module->l('Next ⇾', 'DashboardTranslation'),
                'previousButton' => $this->module->l('⇽ Previous', 'DashboardTranslation'),
                'doneButton' => $this->module->l('Done ✅', 'DashboardTranslation'),
                'start' => [
                    'title' => $this->module->l('Welcome to PrestaShop Metrics!', 'DashboardTranslation'),
                    'description' => $this->module->l('Follow this tutorial to master the module on your fingertips. You can find the shortcut to the module from the Statistics tab.', 'DashboardTranslation'),
                ],
                'shortcut' => [
                    'title' => $this->module->l('Shortcut to the module', 'DashboardTranslation'),
                    'description' => $this->module->l('The PrestaShop Metrics module can be found in the side menu, under the ‘Statistics’ entry', 'DashboardTranslation'),
                ],
                'advanced_start' => [
                    'title' => $this->module->l('Congratulations! You have subscribed to the Advanced plan.', 'DashboardTranslation'),
                    'description' => $this->module->l('Your upgrade has been completed, you now have access to all features, here is a quick overview.', 'DashboardTranslation'),
                ],
                'daterange' => [
                    'title' => $this->module->l('Select the analysis period', 'DashboardTranslation'),
                    'description' => $this->module->l('Select the analysis period and display up to 3 months of data.', 'DashboardTranslation'),
                ],
                'compareMode' => [
                    'title' => $this->module->l('Comparison of periods', 'DashboardTranslation'),
                    'description' => $this->module->l('By default, the comparison with the previous period is activated, you can deactivate it.', 'DashboardTranslation'),
                ],
                'options' => [
                    'title' => $this->module->l('Interface shortcuts', 'DashboardTranslation'),
                    'description' => $this->module->l('Go to the module configuration page, restart the tutorial and switch to full screen.', 'DashboardTranslation'),
                ],
                'panels' => [
                    'title' => $this->module->l('Tabbed navigation', 'DashboardTranslation'),
                    'description' => $this->module->l('View more precisely the key data of your activity: Business, Acquisition and Customer knowledge - available with the Advanced plan', 'DashboardTranslation'),
                ],
                'advanced' => [
                    'title' => $this->module->l('Go further in the analysis', 'DashboardTranslation'),
                    'description' => $this->module->l('Unlock all the features by subscribing to the Advanced plan.', 'DashboardTranslation'),
                ],
                'feedback' => [
                    'title' => $this->module->l('Any ideas to share?', 'DashboardTranslation'),
                    'description' => $this->module->l('Give us your feedback on upcoming features and suggest your ideas.', 'DashboardTranslation'),
                ],
                'tips' => [
                    'title' => $this->module->l('Tips for getting started', 'DashboardTranslation'),
                    'description' => $this->module->l('See tips on how to maximize your revenue, traffic and conversion.', 'DashboardTranslation'),
                ],
                'advanced_daterange' => [
                    'title' => $this->module->l('Extended analysis period', 'DashboardTranslation'),
                    'description' => $this->module->l('Select the analysis period and view up to 14 months of data.', 'DashboardTranslation'),
                ],
                'advanced_sync' => [
                    'title' => $this->module->l('Maintain your performance', 'DashboardTranslation'),
                    'description' => $this->module->l('Your data is regularly synchronized to ensure fast display.', 'DashboardTranslation'),
                ],
            ],
        ];

        return $translations;
    }
}
