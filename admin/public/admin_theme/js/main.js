function loadjscssfile(filename, filetype){
    if (filetype=="js"){
        var fileref=document.createElement('script')
        fileref.setAttribute("type","text/javascript")
        fileref.setAttribute("src", base_url+'public/admin_theme/js/custom/'+filename)
    }
    if (typeof fileref!="undefined")
        document.getElementsByTagName("head")[0].appendChild(fileref)
}
 
loadjscssfile("helper.js", "js");
loadjscssfile("category.js", "js");
loadjscssfile("brand.js", "js");
loadjscssfile("product.js", "js");
loadjscssfile("order.js", "js");
loadjscssfile("stock.js", "js");
loadjscssfile("customer.js", "js");
loadjscssfile("cupon.js", "js");
loadjscssfile("slider.js", "js");
loadjscssfile("logo.js", "js");
loadjscssfile("extra.js", "js");
loadjscssfile("blogs.js", "js");