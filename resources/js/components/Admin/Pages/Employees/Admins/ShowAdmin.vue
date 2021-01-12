<template>
  <div class="Admins">  
<div class="container">
    <div class="left">
    <img src="/images/icons/profile.svg" alt="" class="userimage">
    <p class="username">{{ admin[0].name }} </p>
  </div>  
  <div class="right">
    <div class="info-container">
        <img src="/images/admin/icons/profile-email.svg" alt="" class="icon">
        <p class="value">{{admin[0].email}}</p>
    </div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-phone.svg" alt="" class="icon">
        <p class="value">{{admin[0].phone}}</p>
    </div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-calendar.svg" alt="" class="icon">
        <p class="value">{{admin[0].date_of_join}}</p>
    </div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-location.svg" alt="" class="icon">
        <p class="value">{{admin[0].location}}</p>
    </div>

<div class="buttons-container" v-if="superadmin">
    <button class="edit" @click="openModal">Edit</button>
    <button class="delete">Delete</button>
</div>
    
  </div> 
</div>
<div class="seperator"></div>

<AdminAuthorizations 
:superadmin="superadmin"
:readonly="true"
/>



<Financials 
:tips="50"
:bonus="60"
/>

    <form action="/dummy" method="post">
    <input type="hidden" :value="csrf" name="_token"/>
    <div class="edit-admin-modal" v-if="showModal">
        <div class="modal-container">
            <p class="title">Edit Admin</p>
            <div class="input-container">
                <p class="title">Admin Name</p>
                <input type="text" class="input" name="name" placeholder="Admin Name">
            </div>
            <div class="input-container">
                <p class="title">Email</p>
                <input type="text" class="input" name="email" placeholder="Example@gmail.com">
            </div>
            <div class="input-container">
                <p class="title">Phone Number</p>
                <input type="text" class="input" name="phone" placeholder="(XXX)-XXX-XXXX">
            </div>
            <div class="input-container">
                <p class="title">Date of Birth</p>
                <input type="date" class="input" name="admin_name" placeholder="MM / DD / YYYY">
            </div>
            <div class="input-container">
                <p class="title">Location</p>
                <input type="text" class="input" name="admin_location" placeholder="Location">
            </div>

        <AdminAuthorizations 
        :superadmin="superadmin"
        :readonly="false"
        />

            
            <div class="button-container">
                <button class="save-button" type="submit">Save</button>
            </div>
            <span class="close" @click="closeModal">X</span>

        </div>
    </div>
    </form>

  </div>
</template>

<script>
    import AdminAuthorizations from '../Components/AdminAuthorizations'
    import Financials from '../../../Components/Financials'
export default {
    data() {
        return {
            showModal: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    components:{
        AdminAuthorizations,
        Financials
    },
    props: ['title','date','admins','admin','editadminroute','superadmin'],
    methods: {
        goToEditAdmin(id){
            var url = this.editadminroute.replace('admin_id',id)
            window.location.href= url
        },
        openModal(){
        this.showModal = true;
        document.getElementsByTagName("body")[0].style.overflow = "hidden";

        },
        closeModal() {
        this.showModal= false
        document.getElementsByTagName("body")[0].style.overflow = "auto";
    }
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;
$black: #000;
$orange: #FFA800;
$red: #FF0000;
.Admins{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        .title{
            margin: 26px 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }

    }
    .container{
        width: 100%;
        display: grid;
        grid-template-columns: 230px 1fr;
        justify-content: flex-start;
        align-content: flex-start;
        .left{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        .userimage{
            width: 140px;
            height: 140px;
            border-radius: 70px;
        }
        .username{
            font-family: 'Open-Sans-Bold';
            font-size: 21px;
            color: $black;
            margin-top: 16px;

        }
    }
    .right{
        margin-left: 30px;
        position: relative;
        .info-container{
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            margin: 25px auto;
            .icon{
                width: 30px;
                height: 30px;
                margin-right: 24px;
            }
            .value{
                font-family: 'Open-Sans-Semibold';
                font-size: 18px;
                color: $black;
                
            }
        }
        .buttons-container{
            position: absolute;
            right: 50px;
            top: 80px;
            width: 200px;
            height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            button{
                width: 170px;
                height: 39px;
                background: #fff;
                border-radius: 31px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                font-size: 14px;
                font-family: "Open-Sans-Bold";
                &.edit{
                    color: $orange ;
                    border: 2px solid $orange;
                }
                &.delete{
                    color: $red;
                    border: 2px solid $red;
                }
            }
            .icon{
                margin-right: 16px;
            }
            .text{
                font-size: 14px;
                font-family: 'Open-Sans-Bold';
                color: $blue
            }

        }
    }

    }

.seperator{
    width: 100%;
    height: 1px;
    background: #ccc;
}

    .edit-admin-modal{
            width: 100%;
            height: 100%;
            background: rgba($color: #000000, $alpha: 0.6);
            position: absolute;
            top: 0;
            left: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
            .modal-container{
                padding: 30px 180px;

                width: 904px;
                height: 600px;
                background: #E8ECF3;
                border: 1px solid #F9F9F9;
                border-radius: 20px;
                position: relative;
                overflow-y: auto ;
                .title{
                    font-family: 'Open-Sans-Bold';
                    font-size: 16px;
                    color: $blue;
                    width: 100%;
                    text-align: center;
                }
                .input-container{
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: flex-start;
                    width: 100%;
                    margin: 10px auto;
                    .title{
                    text-align: left;
                    font-family: 'Open-Sans-regular';
                    font-size: 16px;
                    color: $black;
                    margin-bottom: 10px;;
                    }
                    .input{
                    width: 100%;
                    max-width: 628px;
                    background: #F9F9F9;
                    border: 2px solid #EDEDED;
                    border-radius: 7px;
                    padding: 12px;
                
            
                    }
                }
                .button-container{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 40px auto;
                    .save-button{
                        width: 170px;
                        height: 39px;
                        background: $blue ;
                        border: 1px solid $blue;
                        border-radius: 31px;
                        font-size: 14px;
                        font-family: 'Open-Sans-Bold';
                        color: #fff;
                    }
                }
            }
            .close{
                position: absolute;
                top: 30px;
                right: 30px;
                cursor: pointer;
            }
    }
}
</style>