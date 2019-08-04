let cust_cols = [
    {
      data: 'id',
      name: 'ID',
      visible: false,
    },
    {
      data: 'last',
      name: 'Last Name',
      visible: true,
    },
    {
      data: 'expiration',
      name: 'Expiration date',
      visible: true
    }
];

let root_url = window.location.origin+window.location.pathname;

$(document).ready(function() {


    var table = $('#custResults').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": root_url +"/?controller=Customers&action=doAjaxTable",
        "columns" : cust_cols
      });

    $("#custResults > tbody").on( "dblclick", "tr", function () {
        var data = table.row($(this)).data();
        var controller="transactions";
        var action="fetch";

        var link =  root_url +"/?controller="+controller +"&action="+action+"&id="+data["id"];
        document.location.href = link;
     });
  });
