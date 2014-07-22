/**
 * Created with JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-26
 * Time: 上午10:11
 * To change this template use File | Settings | File Templates.
 */
jQuery(document).ready(function($){
    $('#ownPagination').jqPagination({
        max_page:Math.ceil(maxPage),
        current_page:1,
        page_string:" {current_page} / {max_page}",
        paged: function(page) {
            window.location.href=url.replace(/paged=\d/g,"paged="+page);
        }
    });
});