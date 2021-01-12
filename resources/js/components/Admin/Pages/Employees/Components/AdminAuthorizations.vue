<template>
  <div class="auth">
    <p class="auth-title">Authorizations</p>
    <div class="flex-container">
        <div class="row"  v-for="role in authorizations" :key="role.id">
            <input type="checkbox" :hidden="readonly" :checked="role.checked" :name="role.name" v-if="superadmin">
            <p class="text" :class="readonly ? 'grey' : ''">{{role.text}}</p>
        </div>
    </div>
</div>

</template>

<script>
export default {
    props: ['superadmin','readonly'],
    data(){
        return{
            authorizations: [
                {id: 1 ,name: 'auth1', text: 'Accept New Orders',checked: false},
                {id: 2 ,name: 'auth2', text: 'Accept Cancellation Requests & Issue Refund',checked: false},
                {id: 3 ,name: 'auth3', text: 'Edit and Add New Admin',checked: false},
                {id: 4 ,name: 'auth4', text: 'Edit and Add New Staff',checked: false},
                {id: 5 ,name: 'auth5', text: 'Edit and Add New Driver',checked: false},
                {id: 6 ,name: 'auth6', text: 'Create Promo Codes',checked: false},
                {id: 7 ,name: 'auth7', text: 'Modify Current Promo Codes',checked: false},
                {id: 8 ,name: 'auth8', text: 'Create New Zone',checked: false},
                {id: 9 ,name: 'auth9', text: 'Edit Existing Zone',checked: false},
                {id: 10 ,name: 'auth10', text: 'Delete Existing Zone',checked: false},
                {id: 11 ,name: 'auth11', text: 'Modify Customers’ E‐Wallet',checked: false},
                {id: 12 ,name: 'auth12', text: 'View Reports',checked: false},
                {id: 13 ,name: 'auth13', text: 'Print Report',checked: false},
                {id: 14 ,name: 'auth14', text: 'Create service packages',checked: false},
                {id: 15 ,name: 'auth15', text: 'Edit Existing service packages',checked: false},
                {id: 16 ,name: 'auth16', text: 'Assign Drivers',checked: false},
                {id: 17 ,name: 'auth17', text: 'Modify Customers’ service status',checked: false},
                {id: 18 ,name: 'auth18', text: 'Change Customers’ order details',checked: false},
            ]
        }
    }
}
</script>

<style lang="scss">
.auth{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    .auth-title{
        margin: 20px 0;
        font-size: 16px;
        font-family: 'Open-Sans-Bold';
        color: #000;
    }
    .flex-container{
       // margin-left: 40px;
        .row{
            width: 100%;
            display: flex;
            flex-direction: row;   
            margin: 10px 0;
            .text{
                margin-left: 10px;
                width: 100%;
                &.grey{
                    color: #aaa;
                }
            }
        }
    }
}

</style>