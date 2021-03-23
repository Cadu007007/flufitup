<template>
  <div class="NewClients">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <table class="new-clients-table" id="newClientsTable">
        <thead>
        <!-- <tr>
            <th class="username-head"  data-order="asc"><div class="table-head-flex"><p class="title">Username</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="city-head"><div class="table-head-flex"><p class="title">City</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="date-head"><div class="table-head-flex"><p class="title">Day of Subscription</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="package-head"><div class="table-head-flex"><p class="title">Package Name</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="package-head"><div class="table-head-flex"><p class="title">First Delievery</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="package-head"><div class="table-head-flex"><p class="title">Last Delievery</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
        </tr> -->
        <tr>
            <th class="username-head"  data-order="asc"><div class="table-head-flex"><p class="title">Customer name</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="city-head"><div class="table-head-flex"><p class="title">City</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="username-head"  data-order="asc"><div class="table-head-flex"><p class="title">Phone Number</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <!-- <th class="date-head"><div class="table-head-flex"><p class="title">Day of Subscription</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>-->            <th class="package-head"><div class="table-head-flex"><p class="title">Package Name</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <!-- <th class="package-head"><div class="table-head-flex"><p class="title">First Delievery</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="package-head"><div class="table-head-flex"><p class="title">Last Delievery</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>-->
             <th class="package-head"><div class="table-head-flex"><p class="title">Service Status</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
             <th class="package-head"><div class="table-head-flex"><p class="title">Completion Date</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
        </tr>

        </thead>
        <tbody>
        <tr v-for="user in clients" :key="user.id">
            <!-- <td class="username-cell"><p class="link" @click="goToShowUser(client.id)">{{client.name}}</p></td>
            <td class="city-cell">{{client.city}}</td>
            <td class="date-cell">{{client.day_of_subscribe}}</td>
            <td class="package-cell">{{client.package_name}}</td>
            <td class="package-cell">{{client.first_delievery}}</td>
            <td class="package-cell">{{client.last_delievery}}</td> -->

             <td class="username-cell"><p class="link" @click="goToShowUser(user.id)">{{user.name}}</p></td>
            <td class="city-cell">{{user.city}}</td>
            <td class="city-cell">{{user.phone}}</td>
            <!-- <td class="date-cell">{{user.day_of_subscribe}}</td> -->
            <td class="package-cell">{{user.package_name}}</td>
            <!-- <td class="package-cell">{{user.first_delievery}}</td>
            <td class="package-cell">{{user.last_delievery}}</td> -->
            <td class="package-cell">{{user.service_status}}</td>
            <td class="package-cell">{{user.completion_date}}</td>

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

.NewClients{
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
    .new-clients-table{
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

        .table-head-flex{
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;

            .table-head-icon{
                margin-left: 10px;
            }
        }
        .username-head{
            width: 150px;
            position: relative;
            
        }
        .username-cell{
            color: $blue;
            font-family: 'Open-Sans-Semibold';
            .link{
                cursor: pointer;
            }
        }
        .city-head{
            width: 120px;
        }
        .date-head{
            width: 150px;
        }
        .package-head{
            width: 100px;
        }
        .orders-head{
            width: 100px;
        }
        
    }
}
</style>