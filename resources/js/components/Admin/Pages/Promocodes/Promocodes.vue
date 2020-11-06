<template>
  <div class="Promocodes">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

    <table class="promocodes-table">
        <thead>
        <tr>
            <th class="promocode-head">Promocode</th>
            <th class="start-date-head">Start Date</th>
            <th class="end-date-head">End Date</th>
            <th class="status-head">Status</th>
            <th class="buttons-head"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="promocode in promocodes" :key="promocode.id">
            <td class="promocode-cell"><p class="link" @click="goToShowPromocode(promocode.id)">{{promocode.name}}</p></td>
            <td class="start-date-cell">{{promocode.start_date}}</td>
            <td class="end-date-cell">{{promocode.end_date}}</td>
            <td class="status-cell">{{promocode.status}}</td>
            <td class="buttons-cell">
                <div class="buttons-container">
                    <span class="icon edit" @click="goToShowPromocode(promocode.id)" title="Edit"> <img src="/images/admin/icons/edit-icon.svg"> </span>
                    <span class="icon delete" @click="$emit('delete-zone')" title="Delete"><img src="/images/admin/icons/delete-icon.svg"></span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    
        <img  class="add-promocode" src="/images/admin/icons/zones-add-icon.svg" @click="goToAddPromocode" alt="">


  </div>
</template>

<script>
export default {
    props: ['title','date','promocodes','editpromocoderoute','addpromocoderoute'],
    methods: {
        goToShowPromocode(id){
            var url = this.editpromocoderoute.replace('promocode_id',id);
            window.location.href= url;
        },

        goToAddPromocode(){
            window.location.href = this.addpromocoderoute
        },
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;

.Promocodes{
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
    .promocodes-table{
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
        .promocode-head{
            width: 120px;
        }
        .promocode-cell{
            color: $blue;
            font-family: 'Open-Sans-Semibold';
            .link{
                cursor: pointer;
            }
        }
        .start-date-head{
            width: 120px;
        }
        .end-date-head{
            width: 120px;
        }
        .status-head{
            width: 50px;
        }
        .buttons-head{
            width: 120px;
        }
        .buttons-container{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        .icon{
            cursor: pointer;
        }
        }
        
    }
    .add-promocode{
        position: fixed;
        bottom: 20px;
        right: 30px;
        cursor: pointer;
    }
}
</style>