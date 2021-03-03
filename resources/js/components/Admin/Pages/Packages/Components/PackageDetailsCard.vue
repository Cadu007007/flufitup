<template>
  <div class="PackageDetailsCard">
       <p class="title">Package Details</p>
        <AdminPackageDetail class="detail-container" name="Package Category :" :value="package.category"/>
        <AdminPackageDetail class="detail-container" name="Return Duration :" :value="package.return_service"/>
        <AdminPackageDetail class="detail-container" name="No. of Pickups :" :value="package.no_pickups"/>
        <AdminPackageDetail class="detail-container" name="No. of Bags :" :value="package.bags_per_pickup"/>
        <!-- <AdminPackageDetail class="detail-container" name="Maximum Weight :" :value="package.max_weight"/> -->
        <AdminPackageDetail class="detail-container" name="Dry Clean Credit :" :value="package.dry_clean_credit"/>
        <AdminPackageDetail class="detail-container" name="Added Value Services Credit :" :value="package.added_value_service"/>
        <AdminPackageDetail class="detail-container" name="Reward Points :" :value="package.reward_points"/>
        <AdminPackageDetail class="detail-container" name="Price of Extra Pound" :value="package.price_of_extra_pound"/>
        <AdminPackageDetail class="detail-container" name="Advance Notice" :value="package.advance_notice"/>
        <AdminPackageDetail class="detail-container" name="Washing Option" :value="package.washing_option.replace('_', ' ')"/>
        <AdminPackageDetail class="detail-container" name="Dryer Option" :value="package.dryer_option.replace('_', ' ') "/>
  </div>
</template>

<script>
  import AdminPackageDetail from './AdminPackageDetail'

export default {
    props:['package'],
components: {
    AdminPackageDetail
}
}
</script>



<style lang="scss">

$white: #FFFFFF;
$black: #000000;
$blue: #22AEE4;
$grey: #00000099;
$shadow: 0px 0px 10px #0000001A;
.PackageDetailsCard{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;      width: 700px;
        width: 520px;
        height: 550px;
        background: $white;
        border-radius: 40px;
        padding: 24px;
        box-shadow: $shadow;
    .title{
        font-family: 'Lato-Bold';
        font-size: 18px;
        color: $blue;
        margin-bottom: 24px;;
    }  
    .detail-container{
        margin: 8px 0;
        .name{
        font-family: 'Lato-Regular';
        font-weight: bold;
        width: 260px;
        }
        .value{
            color: $grey;
        }
    }
      
    }

</style>