<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      {% include "layouts/header.volt" %}
      <title></title>
   </head>
   <body class="hold-transition skin-blue sidebar-mini">

      <div class="wrapper">

         {% include "layouts/navbar.volt" %}
         
         {% include "layouts/sidebar.volt" %}

         <div class="content-wrapper">
            {{ content() }}
         </div>

         <footer class="main-footer">
            <div class="pull-right hidden-xs">
               <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
         </footer>


         {% include "layouts/footer.volt" %}

      </div>

   </body>
</html>
