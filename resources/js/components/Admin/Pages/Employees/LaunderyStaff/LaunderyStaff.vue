<template>
  <div class="LaunderyStaff">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

    <table class="staff-table">
        <thead>
        <tr>
            <th class="username-head">Laundery Staff</th>
            <th class="email-head">Email</th>
            <th class="phone-head">Phone Number</th>
            <th class="date-of-join-head">Date of Join</th>
            <th class="location-head">Location</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="person in staff" :key="person.id">
            <td class="username-cell"><p class="link" @click="goToShowUser(person.id)">{{person.name}}</p></td>
            <td class="email-cell">{{person.email}}</td>
            <td class="phone-cell">{{person.phone}}</td>
            <td class="date-of-join-cell">{{person.date_of_join}}</td>
            <td class="location-cell">{{person.location}}</td>
        </tr>
        </tbody>
    </table>
    <img  class="add-staff" src="/images/admin/icons/zones-add-icon.svg" @click="goToAddstaff" alt="">

  </div>
</template>

<script>
export default {
    props: ['title','date','staff','showstaffroute','addstaffroute'],
    methods: {
        goToAddstaff(){
            window.location.href= this.addstaffroute;
        },
        goToShowUser(id){
            var url = this.showstaffroute.replace('staff_id',id);
            window.location.href= url;
        }
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;

.LaunderyStaff{
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
    .staff-table{
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
        .date-of-join-head{
            width: 100px;
        }
        .location-head{
            width: 140px;
        }
        
    }
    .add-staff{
        position: fixed;
        bottom: 20px;
        right: 30px;
        cursor: pointer;
    }
}
</style>