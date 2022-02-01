<template>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="pull-left">
            <!--<img src="/assets/icons-svg/bars-solid.svg" class="side-images">-->
            <div class="side-images" v-on:click="openNav">
                <i class="fa fa-bars"></i>
            </div>
        </div>          
        <div class="mx-auto">
            <a href="#">
                <img src="/assets/logo-imdb.png" width="90px">
            </a>
        </div>
        <div class="pull-right">
            <!--<img src="/assets/icons-svg/user-solid.svg" class="side-images">-->
            <div class="side-images">
                <i class="fa fa-user"></i>
            </div>
        </div>
        <div id="mySidebar" class="sidebar" :style="{ width: width }">
            <div class="side-images closeButton" v-on:click="closeNav">
                <i class="fa fa-arrow-left"></i>
            </div>
            <div class="sidebar-elements">
                This is a full screen menu<br>
                Close me from the upper "Back Arrow"
            </div>
        </div>
    </nav>
</template>

<script>

    export default {
        data(){
            return { 
                width: '0px'   
            }
        },
        mounted() {
  
        }, 
        methods: {
            openNav(){
                this.width = '100%';
            },
            closeNav(){
                this.width = '0px';
            }
        },
    }
</script>

<style>
    .navbar {
        background-color: #F5C518;
    }
    .side-images{
        font-size: 45px;
        color:white;
        cursor:pointer;
    }
    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #F5C518;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
     .sidebar-elements {
        height: 100%;
        width: 100%;
        display: flex;
        position: relative;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        
    }
    .closeButton{
        color: #111;
        margin-left: 10px;
    }
</style>
