$(document).ready(function() {
    let filter_category = [];
    filter_category = localStorage.getItem('kategori') ?? [];
    console.log(filter_category);

    if (filter_category === '' || typeof(filter_category) === null) {
      filter_category = [];
    } else {
      filter_category = filter_category.split(',') === [''] ? [] : filter_category.split(',');
    }

    if (filter_category.length > 0) {
      for (let i = 0; i < filter_category.length; i++) {
        $(`.category[value="${filter_category[i]}"]`).prop('checked', true);
      }
    }

    $('.category').on('change', function(e) {
        if ($(this).prop('checked') == true) {
            filter_category.push(e.target.value);
            $(`.category[value="${e.target.value}"]`).prop('checked', true);
            // $(this).prop("checked", filter());
        } else {
          const index = filter_category.indexOf(e.target.value);
          if (index > -1) {
            filter_category.splice(index, 1);
          }
          $(`.category[value="${e.target.value}"]`).prop('checked', false);
        }
        localStorage.setItem('kategori', filter_category);
        filter();
    });

    $('#search').keypress(function(e) {
        if (e.keyCode == 13) {
            filter();
        }
    });

    $('#sort').on('change', function() {
        filter();
    });

    function filter() {
        let categoryId = '';
        for (let i = 0; i < filter_category.length; i++) {
          if (categoryId == '') {
            categoryId = `${filter_category[i]}`;
          } else {
            categoryId += `-${filter_category[i]}`;
          }
        }
        let keyword = $('#search').val();

        let sort = $('#sort').val();

        window.location.replace(`?kategori=${categoryId}&keyword=${keyword}&sort=${sort}`);
    }
});
