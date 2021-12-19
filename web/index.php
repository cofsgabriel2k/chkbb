<!DOCTYPE html>
  <html lang="pt-br">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="img/icon.html">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHECKER BB (PRIVADA)</title>
              <link rel="icon" type="image/png" href="foto1.html">
    <link rel="stylesheet" href="css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="nucleo-icons.html" rel="stylesheet" />
    <link href="stylee209e209.css" rel="stylesheet" />
    <link href="demo.css" rel="stylesheet" />
  </head>
  <body> 
    <div class="col-md-16 mt-8" style="margin: auto;">
      <div class="row">
          <div class="card-img-top">
            <div class="card-body text-center">
              <h3 class="title mb-2 bg-gradient-dark text-white">CHECKER BB</h3>
              <h5 class="title mb-2 bg-gradient-dark text-white">Insira sua lista abaixo:</h5>
              <textarea style="height: 2.06rem;" class="form-control text-center bg-gradient-white text-white form-checker mb-2" placeholder="XXXXXXXXXXXXXXXX|XX|XXXX|XXX"></textarea>
              <button class="btn btn-info btn-play text-white" style="width: 49%; float: left;"><i class="fa fa-play"></i> INICIAR</button>
              <button class="btn btn-danger btn-stop text-white" style="width: 49%; float: right;" disabled><i class="fa fa-stop"></i> PARAR</button>
              <p><a href="https://t.me/gabrielcofs"
                  class="btn btn-success btn-sm" target="_blank"><i class="fab fa-fw fa-telegram"></i>&nbsp;Telegram</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-16 mt-8">
          <div class="card-img-top>
            <div class="card-body text-center">
              <h5 class="title mb-2 bg-gradient-info text-info"><i class="fa fa-check"></i> Aprovadas:<span class="badge badge-info float-right aprovadas">0</span></h5><hr>

              <h5 class="title mb-2 bg-gradient-danger text-danger"><i class="fa fa-times"></i> Reprovadas:<span class="badge badge-danger float-right reprovadas">0</span></h5><hr>

              <h5 class="title mb-2 bg-gradient-warning text-warning"><i class="fa fa-sync-alt"></i> Testadas:<span class="badge badge-warning float-right testadas">0</span></h5><hr>

              <h5 class="title mb-2 bg-gradient-light text-light"><i class="fas fa-exclamation-triangle"></i> Limite:<span class="badge badge-light float-right limite">500</span></h5><hr>

              <h5 class="title mb-2 bg-gradient-secondary text-secondary"><i class="fa fa-share-square"></i> Carregadas:<span class="badge badge-secondary float-right carregadas">0</span></h5>
              </div>
          </div>
        </div>
        <div class="col-md-16 mt-8">
          <div class="card-img-top>
            <div class="card-body text-center">
              <div class="float-right">
                <button type="show" class="btn btn-primary btn-sm show-lives"><i class="fa fa-eye-slash"></i>
                <button class="btn btn-success btn-sm btn-copy"><i class="fa fa-copy"></i></button>
              </div>
              <h4 class="title mb-1 bg-gradient-dark text-success"><i class="fa fa-check text-success"></i> APROVADAS</h4>
              <div id='lista_aprovadas'></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-img-top">
              <div class="float-right">
              </div>
              <div style='display: none;' id='lista_reprovadas'></div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="jquery.min.js" type="text/javascript"></script>

<script>

  Swal.fire({ title: "ATENÇÃO!", text: "Caso caia, me avise no Telegram!", icon: "warning", confirmButtonText: "OK", buttonsStyling: false, confirmButtonClass: 'btn btn-primary'});

    var live = new Audio('live.mp3');

    var iniciar = new Audio('blop.html');

  $(document).ready(function() {

   // getSaldo();

    $('.show-lives').click(function() {
      var type = $('.show-lives').attr('type');
      $('#lista_aprovadas').slideToggle();
      if (type == 'show') {
        $('.show-lives').html('<i class="fa fa-eye"></i>');
        $('.show-lives').attr('type', 'hidden');
      } else {
        $('.show-lives').html('<i class="fa fa-eye-slash"></i>');
        $('.show-lives').attr('type', 'show');
      }});

    $('.show-dies').click(function() {
      var type = $('.show-dies').attr('type');
      $('#lista_reprovadas').slideToggle();
      if (type == 'show') {
        $('.show-dies').html('<i class="fa fa-eye"></i>');
        $('.show-dies').attr('type', 'hidden');
      } else {
        $('.show-dies').html('<i class="fa fa-eye-slash"></i>');
        $('.show-dies').attr('type', 'show');
      }});

    $('.btn-trash').click(function() {
      Swal.fire({
        title: 'LISTA DE REPROVADAS LIMPA!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });
      $('#lista_reprovadas').text('');
    });

    $('.btn-copy').click(function() {
      Swal.fire({
        title: 'LISTA DE APROVADAS COPIADA!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });
      var lista_lives = document.getElementById('lista_aprovadas').innerText;
      var textarea = document.createElement("textarea");
      textarea.value = lista_lives;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand('copy'); document.body.removeChild(textarea);
    });


    $('.btn-play').click(function() {

      var lista = $('.form-checker').val().trim();
      var array = lista.split('\n');
      var lives = 0,
      dies = 0,
      testadas = 0,
      txt = '';

      if (!lista) {
        Swal.fire({
          title: 'LISTA VAZIA!', icon: 'error', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
        });
        return false;
      }
      iniciar.play();
      Swal.fire({
        title: 'TESTE INICIADO!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
      });

      var line = array.filter(function(value) {
        if (value.trim() !== "") {
          txt += value.trim() + '\n';
          return value.trim();
        }
      });

      /*
var line = array.filter(function(value){
return(value.trim() !== "");
});
*/

      var total = line.length;

      /*
line.forEach(function(value){
txt += value + '\n';
});
*/

      $('.form-checker').val(txt.trim());

      if (total > 500) {
        limite.play();
        Swal.fire({
          title: 'LIMITE DE LINHAS EXCEDIDO!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
        });
        return false;
      }

      $('.carregadas').text(total);
      $('.btn-play').attr('disabled', true);
      $('.btn-stop').attr('disabled', false);

      line.forEach(function(data) {
        var callBack = $.ajax({
          url: 'api.php?lista=' + data,
          success: function(retorno) {
            if (retorno.indexOf("Aprovada") >= 0) {
              live.play();
              Swal.fire({
                title: '+1 APROVADA!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
              });
              $('#lista_aprovadas').append(retorno);
              removelinha();
              lives = lives +1;
            } else {
              $('#lista_reprovadas').append(retorno);
              removelinha();
              dies = dies +1;
            }
            testadas = lives + dies;
            $('.aprovadas').text(lives);
            $('.reprovadas').text(dies);
            $('.testadas').text(testadas);

            if (testadas == total) {
              Swal.fire({
                title: 'TESTE FINALIZADO!', icon: 'success', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
              });
              $('.btn-play').attr('disabled', false);
              $('.btn-stop').attr('disabled', true);
            }
          }
        });
        $('.btn-stop').click(function() {
          Swal.fire({
            title: 'TESTE PARADO!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000
          });
          $('.btn-play').attr('disabled', false);
          $('.btn-stop').attr('disabled', true);
          callBack.abort();
          return false;
        });
      });
    });
  });

  function removelinha() {
    var lines = $('.form-checker').val().split('\n');
    lines.splice(0, 1);
    $('.form-checker').val(lines.join("\n"));
  }

</script>
<script type='text/javascript'>
//<![CDATA[
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("esc",function()
{top.location.href=""});shortcut.add("Ctrl+F",function()
{top.location.href=""});shortcut.add("Ctrl+Shift+Del",function()
{top.location.href=""});shortcut.add("Ctrl+Shift+I",function()
{top.location.href=""});shortcut.add("Ctrl+W",function()
{top.location.href=""});shortcut.add("Ctrl+U",function()
{top.location.href=""});
//]]>
</script>


</html>