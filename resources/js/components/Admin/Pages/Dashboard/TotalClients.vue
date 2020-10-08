<template>
  <div class="TotalClients">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <table class="clients-table">
        <thead>
        <tr>
            <th class="username-head">Username</th>
            <th class="email-head">Email</th>
            <th class="phone-head">Phone Number</th>
            <th class="birthday-head">Date of Birth</th>
            <th class="orders-head">Number of Orders</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="client in clients" :key="client.id">
            <td class="username-cell"><p class="link" @click="goToShowUser(client.id)">{{client.name}}</p></td>
            <td class="email-cell">{{client.email}}</td>
            <td class="phone-cell">{{client.phone}}</td>
            <td class="birthday-cell">{{client.birthday}}</td>
            <td class="orders-cell">{{client.numberoforders}}</td>
        </tr>
        </tbody>
    </table>

  </div>
</template>

<script>
export default {
    props: ['title','date','clients','showuserroute'],
    methods: {
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

.TotalClients{
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
    .clients-table{
        width: 100%;
        border-collapse: collapse;
        th,td {
            margin: 0 ;
            border-bottom: 1px solid $light-grey;
            text-align: left;
            padding: 12px 0;
        }
        th{
            color: $text-grey;
            font-size: 16px;
            font-family: 'Open-Sans-Regular';
            font-weight: lighter;
        }
        td{
            font-size: 14px;
        }
        .username-head{
            width: 130px;
        }
        .username-cell{
            color: $blue;
            font-family: 'Open-Sans-Semibold';
            .link{
                cursor: pointer;
            }
        }
        .email-head{
            width: 150px;
        }
        .phone-head{
            width: 120px;
        }
        .birthday-head{
            width: 100px;
        }
        .orders-head{
            width: 140px;
        }
        
    }
}
</style>