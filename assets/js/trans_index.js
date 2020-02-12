
let trans_index_cols = [
  {
    data: 'id',
    name: 'ID',
    visible: false,
  },
  {
    data: 'user_id',
    name: 'User ID',
    visible: false,
  },
  {
    data: 'amount',
    name: 'Amount',
    visible: true,
  },
  {
    data: 'expiration',
    name: 'Expiration date',
    visible: true
  }
];

$(document).ready(function() {
    let root_url = window.location.origin+window.location.pathname;

    var table = $('#transResults').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": root_url+"/?controller=transactions&action=doAjaxTable",
        "columns" : trans_index_cols
      });

    $("#transResults > tbody").on( "dblclick", "tr", function () {
        var data = table.row($(this)).data();
        var controller="transactions";
        var action="fetch";
        var link= root_url+"/?controller="+controller+"&action="+action+"&id="+data["user_id"];

        document.location.href = link;

     });

  });
