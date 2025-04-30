$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})

  function AddEvaluateur(){
    let email = $('#evaluateur').val();

    if (!evaluateurs.includes(email)) {
        evaluateurs.push(email);
    }

    $('.evaluateurs').val(evaluateurs);

    $('#tab-evaluateur').html("");
    for(i=0;i<evaluateurs.length;i++)
    {
      let j = i+1;
      let txt = `
      <tr>
          <td>${j}</td>
          <td>${evaluateurs[i]}</td>
          <td>
              <i class="fas fa-trash text-lg text-warning" onclick="DeleteEvaluateur(${evaluateurs[i]})"></i>
          </td>
      </tr>
      `;
      $('#tab-evaluateur').append(txt);
    }

  }

  function DeleteEvaluateur(email){
    evaluateurs.pop(email);

    $('.evaluateurs').val(evaluateurs);

    $('#tab-evaluateur').html("");
    for(i=0;i<evaluateurs.length;i++)
    {
      let j = i+1;
      let txt = `
      <tr>
          <td>${j}</td>
          <td>${evaluateurs[i]}</td>
          <td>
              <i class="fas fa-trash text-lg text-warning" onclick="DeleteEvaluateur(${evaluateurs[i]})"></i>
          </td>
      </tr>
      `;
      $('#tab-evaluateur').append(txt);
    }

  }


