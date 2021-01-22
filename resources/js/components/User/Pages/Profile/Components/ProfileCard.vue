<template>
  
  <div class="ProfileCard">
    <div class="image-name-div">
        <img :src=profileimage alt="" class="image">
        <p class="name">Mohamed Samir</p>
    
    </div>
    <div class="details">

    <ProfileInfoContainer
        title="Email"
        :value ="email"
        :status="emailstatus"
        />
        <ProfileInfoContainer
        title="Phone Number"
        :value ="phone"
        :status= "phonestatus"
        />
        
        <ProfileInfoContainer
        title="Address"
        :value ="address"
        />

        <ProfileInfoContainer
        title="Date of Birth"
        :value ="birthday"
        />
    </div>
    <div class="change-password-container">
        <a class="change-password" :href="changepasswordroute">Change Password</a>
    </div>

    <div class="my-4 d-flex flex-row justify-content-cent">
        <button class="btn btn-primary px-4" @click="goToEditProfile">Edit</button>
    </div>
  </div>
</template>



<script>
import ProfileInfoContainer from '../Components/ProfileInfoContainer'
export default {
components:{
    ProfileInfoContainer,
},
props:['profileimage','email','emailstatus','phone','phonestatus','address',
'birthday','editprofileroute','changepasswordroute'],
methods:{
    goToEditProfile(){
        window.location.href= this.editprofileroute
    }
}
}
</script>


<style lang="scss">
$white: #ffffff;
$black: #000000;
$grey: #00000099;
$red: #FF0000CC;
$green: #007C09;
$blue: #22AEE4;
.ProfileCard{
    min-height: 485px;
    width: 100%;
    background: $white;
    border-radius: 20px;
    box-shadow: 0px 0px 10px #0000001A;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 0 24px;
    .image-name-div{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        position: relative;
        .image{
            width: 90px;
            height: 90px;
            margin-top: 17px;
            border-radius: 25px;
        }
        .name{
            margin-top: 24px;
            font-size: 18px;
            font-weight: bold;
            color: $black;
        }
        .edit-icon{
            width: 30px;
            height: 30px;
            position: absolute;
            right: 120px;
            top: 50px;
        }
    }

    .details{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
    
    }

    .change-password-container{
        width: 100%;
        margin-top: 20px;

    .change-password{
        font-size: 14px;
        color: $blue;
    }
    }
}
</style>
