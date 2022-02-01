<template>
    <div class="container">
    <div v-for="movie in movies">
        <div class="card">
                <div class="row no-gutters">
                    <div class="col-4">
                        <img :src="movie.movie.image" class="img-fluid image-style" alt="">
                    </div>
                    <div class="col-8">
                        <div class="card-block px-2">
                            <h4 class="card-title">{{ movie.movie.name }}</h4>
                            <p class="card-text">
                            <!--<img src="/assets/icons-svg/star-solid.svg" class="star">-->
                            <div class="star"><i class="fa fa-star"></i></div>
                            {{ movie.movie.rating }}
                            </p>
                            <div v-for="(artists, index) in movie.artists" class="description-text">
                                <b>{{ index }}</b>:
                                <div v-for="(artistName) in artists" class="artists">
                                    {{ artistName.name }}
                                </div>
                            </div>
                            <a href="#" class="btn btn-view">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'

import { faHatWizard } from '@fortawesome/free-solid-svg-icons'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    export default {
        data(){
            return{
                movies: []
            }
        },
        mounted() {
            axios.get('api/movies').then((res)=>{
                this.movies = res.data;    
            })
        },
    }
</script>

<style>
    .card-title{
        padding-top: 15px;
        font-size: 14px;
    }
    .description-text, .card-text{
        font-size: 12px;
    }
    .image-style{
        padding: 7px;
        height: 300px;
        width: auto;
    }
    .card{
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 100px;    
        margin-right: 100px;
        box-shadow: 5px 5px 15px 5px rgba(0,0,0,0.13);
        border-radius: 10px;
    }
    .card:hover{
        transform:scale(1.01);
    }
    .star{
        color: #f5c518;
        font-size:25px;
        display: inline-block;
    }
    .btn-view{
        background-color: #F5C518;
        position: absolute;
        bottom: 20px;
    }
    .artists{
        display: inline-block;
    }
    .artists ~ .artists::before {
        content: ', '; 
    }
</style>