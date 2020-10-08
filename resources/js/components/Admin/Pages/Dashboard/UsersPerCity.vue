<template>
  <div class="UsersPerCity">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

    <div class="flex-container">
        <div class="flex-column">
            <div class="city-user" :id="city.id" @click="loadActiveCityUsers(city.id)" :class="activecityid == city.id ? 'active' : ''" v-for="(city,index) in cities" :key="city.id">
                <p class="city-name">{{ city.name }}:</p>
                <p class="users-count">{{ getCityUsersCount(city.id) }} Users</p>
            </div>
        </div>
        <div class="users-card" v-if="cityusers.length">
            <div class="user-container">Username</div>
            <div class="user-container" v-for="user in cityusers" :key="user.id"><p class="username" @click="goToShowUser(user.id)">{{user.name}}</p></div>
        </div>
    </div>

  </div>
</template>

<script>
export default {
    props: ['title','date','cities','users','showuserroute'],
    data() {
        return {
            activecityid: 0,
            cityusers: [],
        }
    },
    methods: {
        getCityUsersCount(cityId){
            var cities = this.cities
            var users = this.users
            var count =0;
            for(var index=0; index < cities.length; index++){
                users.forEach(function(user, index){
                   if(user.city_id == cityId){
                       count ++
                   }
                 }); 
            return count
            }
        },
        loadActiveCityUsers(clickedCityId){
            this.activecityid = clickedCityId

            var cities = this.cities
            var users = this.users
            var cityUsersArray = []
            // get users of the city
            for(var index=0; index < cities.length; index++){
                users.forEach(function(user, index){
                   if(user.city_id == clickedCityId){
                       if(cityUsersArray.indexOf(user) == -1){
                        cityUsersArray.push(user)
                       }
                   }
                 }); 
            }
            
            this.cityusers = cityUsersArray
        },
        goToShowUser(id){
            var url = this.showuserroute.replace('user_id',id);
            window.location.href= url;
        }
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;
$black: #000;

.UsersPerCity{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        .title{
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }

    }

    .flex-container{
        width: 100%;
        margin: 10px auto;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
    .flex-column{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        .city-user{
            margin: 12px 0;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            color: $black;
            &.active{
            color: $blue !important;
            }
            .city-name{
                font-family: 'Open-Sans-Semibold';
                font-size: 16px;
            }
            .users-count{
                margin-left: 20px;
                font-family: 'Open-Sans-Bold';
                font-size: 16px;
            }
        }
    }
    .users-card{
        width: 444px;
        height: 541px;
        box-shadow: 0px 0px 6px #0000001A;
        border: 2px solid #E8ECF3;
        margin-left: 200px;
        padding: 16px 24px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        .user-container{
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-size: 15px;
            font-family: 'Open-Sans-Regular';
            color: $text-grey;
            border-bottom: 1px solid #EEF2F4;
            .username{
                font-size: 13px;
                font-family: 'Open-Sans-Bold';
                color: $blue;
                cursor: pointer;

            }

        }
    }
    }   
    
}
</style>