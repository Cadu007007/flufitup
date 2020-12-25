<template>
  <div class="PackageDetailsCard">
       <p class="title">Package Details</p>
        <AdminPackageDetail class="detail-container" name="Package Duration :" :value="package[0].package_duration"/>
        <AdminPackageDetail class="detail-container" name="No. of Pickups :" :value="package[0].no_of_pickups"/>
        <AdminPackageDetail class="detail-container" name="No. of Bags :" :value="package[0].no_of_bags"/>
        <AdminPackageDetail class="detail-container" name="Maximum Weight :" :value="package[0].max_weight"/>
        <AdminPackageDetail class="detail-container" name="Return Duration :" :value="package[0].return_duration"/>
        <AdminPackageDetail class="detail-container" name="Dry Clean Credit :" :value="package[0].dry_clean_credit"/>
        <AdminPackageDetail class="detail-container" name="Added Value Services Credit :" :value="package[0].added_value_service_credit"/>
        <AdminPackageDetail class="detail-container" name="Reward Points :" :value="package[0].reward_points"/>
        <AdminPackageDetail class="detail-container" name="Price of Extra Pound" :value="package[0].price_of_extra_pound"/>
        <AdminPackageDetail class="detail-container" name="Advance Notice" :value="package[0].advance_notice"/>
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