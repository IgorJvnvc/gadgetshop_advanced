$(document).ready(function(){
    $(document).on('click', '.m-pagination', function(e){
        e.preventDefault();

        let limit = $(this).data('limit');

        let data = {
            limit: limit
        }

        ajaxCallBack("models/paginacija.php", "post", data, function(result){
            console.log(result);
            printM(result.telefoni, limit);
            printPagination(result.brojStranica);
        })
    })
})
function ajaxCallBack(url, method, data, result){
    $.ajax({
        url: url,
        method: method,
        data: data,
        dataType: "json",
        success: result,
        error: function(xhr){
            console.error(xhr);
            // if 500...
            // if 404...
        }
    });
}

function printM(telefon, limit){
    let html = "";
    if(telefon.length == 0){
        html += "<p>Nema trenutno telefona.";
    }
    else {
     
        let rb = limit * 2 + 1;
        for (let r of telefon) {
           
            html += `      <div class="col-lg-3">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="${r.mala_slika}" width="150" height="250" alt="">
                                       
                                    </div>
                                    <div class="down-content ">
                                        <span>${r.naziv} </span>
                                        <h4>${r.naziv_m}</h4>
                                        <ul class="post-info">
                                            <li> Vec od  ${r.cena}$ </li>
                                            <li>${r.naziv_os} </li>

                                        </ul>
                                        <p>${r.opis} </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                 <a href="prod.php?id=${r.id}" class="btn btn-success" > Pogledaj  </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>`
        }
    }

    $("#prikazF").html(html);
}

function printPagination(brojStranica){
    html = "";

    for(let i = 0; i < brojStranica; i++){
        html += `
        <li class="page-item">
             <a class="page-link m-pagination" href="#" data-limit="${i}">${(i+1)}</a>
        </li>`
    }


    $("#paginacija").html(html);
}

$(document).ready(function (){
    $(document).on('click', '#taster',function (e){
        e.preventDefault();
        let name,lName,email,username,password,brojGresaka,reEmail,pSlovo,passM;
        name=$('#name');
        lName=$('#lName');
        username=$('#username');
        password=$('#password');
        email = $('#email');
        brojGresaka = 0;
        reEmail=/^[\w]+(\w.\_\-)*\@[\w]+(\.[\w]+)?(\.[a-z]{2,3})$/;
        pSlovo=/^[A-Z]{1}[a-z]{2,15}$/;
        passM=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,20}$/;
        if(!pSlovo.test($(name).val())){
            brojGresaka++;

            $(name).addClass('error');
        }else{
            $(name).removeClass('error');
        }

        if(!pSlovo.test($(lName).val())){
            brojGresaka++;

            $(lName).addClass('error');
        }else{
            $(lName).removeClass('error');
        }

        if ($(username).val()==""){
            brojGresaka++;

            $(username).addClass('error');
        }else{
            $(username).removeClass('error');
        }

        if(!passM.test($(password).val())){
            brojGresaka++;

            $(password).addClass('error');
        }else{
            $(password).removeClass('error');
        }
        if(!reEmail.test($(email).val())){
            brojGresaka++;

            $(email).addClass('error');
        }else{
            $(email).removeClass('error');
        }


        if(brojGresaka==0){
    let  podaciZaSlanje={
        name: $(name).val(),
        lName: $(lName).val(),
        username: $(username).val(),
        password: $(password).val(),
        email: $(email).val()
    }
    //console.log(podaciZaSlanje)
ajaxCallBack( "models/registracija.php","post",podaciZaSlanje, function (result){
    $('#napisi').html('<p class="alert alert-success my-3">Uspesna registracija!<a href="index.php?page=login">Ulogujte se!</a></p> ');

});


}

    })




})
$(document).ready(function (){
$(document).on('click', '#btnLogovanje',function (e){
    e.preventDefault();
    let username, password, brojGresaka;
    username = $('#username');
    password =  $('#password');
    brojGresaka = 0;

    if(brojGresaka==0){
        let  podaciZaSlanje = {
            username: $(username).val(),
            password: $(password).val()
        }

        ajaxCallBack("models/logovanje.php","post", podaciZaSlanje,function (result){
         //   console.log(result);
            $('#odgovor').html(' <a class="nav-link" href="models/odjava.php">Odjavite se' );
            $('#ispisi').html('<p class="alert alert-success my-3">Dobrodosli na nas sajt !!!</p> ');
        })
    } 



})

})
