window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        if ((window.location.href.indexOf("transactions") > -1)||(window.location.href.indexOf("product-transactions") > -1)||(window.location.href.indexOf("gift-certificate-payments") > -1)||((window.location.href.indexOf("lottery-winners-list") > -1))) {
            new simpleDatatables.DataTable(datatablesSimple,{
                perPageSelect: [10,50,100,500]
            }); 
        }
        else{
            new simpleDatatables.DataTable(datatablesSimple);
        }
    }
});
