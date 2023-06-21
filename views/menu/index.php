   <?php 

    function deslogar(){

        session_destroy();
        header("Location: ./index.php");
   
    }
   ?>
   <div class="layout">

       <div class="layout__left-sidebar">
           <aside class="sidebar-menu">
               <div class="sidebar-menu__item sidebar-menu__item--active">
                   <img src="/seminario-uniasselvi/assets/svg/home.svg" class="sidebar-menu__item-icon" />
                   Página Inicial
               </div>

               <div class="sidebar-menu__item">
                   <img src="/seminario-uniasselvi/assets/svg/profile.svg" class="sidebar-menu__item-icon" />
                   New Post
               </div>

               <div class="sidebar-menu__item">
                   <img src="/seminario-uniasselvi/assets/svg/profile.svg" class="sidebar-menu__item-icon" />
                   Log out
               </div>
           </aside>
       </div>