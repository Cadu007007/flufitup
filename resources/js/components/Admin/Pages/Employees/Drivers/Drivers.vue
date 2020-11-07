<template>
  <div class="Drivers">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

    <table class="driver-table" id="driversTable">
        <thead>
        <tr>
            <th class="username-head"  data-order="asc"><div class="table-head-flex"><p class="title">Driver Name</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="city-head">City Name</th>
            <th class="date-of-join-head"  data-order="asc"><div class="table-head-flex"><p class="title">Date of Joining</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>

            <th class="assigned-head">Assigned</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="driver in drivers" :key="driver.id">
            <td class="username-cell"><p class="link" @click="goToShowDriver(driver.id)">{{driver.name}}</p></td>
            <td class="city-cell">{{driver.city}}</td>
            <td class="date-of-join-cell">{{driver.date_of_join}}</td>
            <td class="assigned-cell">{{driver.assigned}}</td>
        </tr>
        </tbody>
    </table>
    <img  class="add-driver" src="/images/admin/icons/zones-add-icon.svg" @click="goToAddDriver" alt="">

  </div>
</template>

<script>
export default {
    props: ['title','date','drivers','showdriverroute','adddriverroute'],
    methods: {
        goToAddDriver(){
            window.location.href= this.adddriverroute;
        },
        goToShowDriver(id){
            var url = this.showdriverroute.replace('driver_id',id);
            window.location.href= url;
        }
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;

.Drivers{
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
    .driver-table{
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
        .city-head{
            width: 120px;
        }
        .date-of-join-head{
            width: 100px;
        }
        .assigned-head{
            width: 140px;
        }
        
    }
    .add-driver{
        position: fixed;
        bottom: 20px;
        right: 30px;
        cursor: pointer;
    }
}
</style>