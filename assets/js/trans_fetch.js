
let trans_fetch_cols = [
  {
    data: 'id',
    name: 'ID',
    visible: false,
  },
  {
    data: 'user_id',
    name: 'user_id',
    visible: false,
  },
  {
    data: 'first',
    name: 'First Name',
    visible: true
  },
  {
    data: 'last',
    name: 'Last Name',
    visible: true
  },

  {
    data: 'phone',
    name: 'Phone',
    visible: true
  },
  {
    data: 'expiration',
    name: 'Expiration date',
    visible: true
  },
  {
    data: 'amount',
    name: 'Amount',
    visible: true
  }
];

$(document).ready(function() {
  let root_url = window.location.origin+window.location.pathname;

  let searchParams = new URLSearchParams(window.location.search);

  let table = $('#table-results').DataTable({
      "processing": true,
      "serverSide": false,
      "ajax":  root_url +"/?controller=Transactions&action=ajaxCustomerTransactions&id=" + searchParams.get('id'),
      "columns" : trans_fetch_cols,
    });

    $('#table-results tbody').on( 'click', 'tr', function () {
    } );

    $('#table-results').on( 'init.dt', function () {
      let table = $('#table-results').DataTable();

      $('#customer').val(table.row().data()["first"] + " " + table.row().data()["last"]);
      $("#phone").val(table.row().data()["phone"]);


    }).dataTable();




});
