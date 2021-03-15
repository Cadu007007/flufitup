<template>
    <div class="PackageDetailsCard">
        <p class="title">Package Details</p>
        <AdminPackageDetail
            class="detail-container"
            name="Package Category :"
            :value="package.category.replace('_', ' ')"
            tag=""
        />
        <AdminPackageDetail
            class="detail-container"
            name="Return Duration :"
            :value="package.return_service"
            tag="hrs"
        />
        <AdminPackageDetail
            class="detail-container"
            name="No. of Pickups :"
            :value="package.no_pickups"
            tag="Pickups"
        />
        <AdminPackageDetail
            class="detail-container"
            name="No. of Bags :"
            :value="package.bags_per_pickup"
            tag="Bags"
        />
        <!-- <AdminPackageDetail class="detail-container" name="Maximum Weight :" :value="package.max_weight"/> -->
        <AdminPackageDetail
            class="detail-container"
            name="Dry Clean Credit :"
            :value="package.dry_clean_credit"
            tag="$"
        />
        <AdminPackageDetail
            class="detail-container"
            name="Added Value Services Credit :"
            :value="package.added_value_service"
            tag="$"
        />
        <AdminPackageDetail
            class="detail-container"
            name="Reward Points :"
            :value="package.reward_points"
            tag="Point"
        />
        <AdminPackageDetail
            class="detail-container"
            name="Price of Extra Pound"
            :value="package.price_of_extra_pound"
            tag="$"
        />
        <AdminPackageDetail
            class="detail-container"
            name="Advance Notice"
            :value="package.advance_notice"
            tag="Days"
        />
        <AdminPackageDetail
            class="detail-container"
            name="Washing Option"
            :value="package.washing_option.replace('_', ' ')"
            tag=""
        />
        <AdminPackageDetail
            class="detail-container"
            name="Dryer Option"
            :value="package.dryer_option.replace('_', ' ')"
            tag=""
        />
    </div>
</template>

<script>
import AdminPackageDetail from "./AdminPackageDetail";

export default {
    props: ["package"],
    components: {
        AdminPackageDetail
    }
};
</script>

<style lang="scss">
$white: #ffffff;
$black: #000000;
$blue: #22aee4;
$grey: #00000099;
$shadow: 0px 0px 10px #0000001a;
.PackageDetailsCard {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    width: 700px;
    width: 520px;
    height: 550px;
    background: $white;
    border-radius: 40px;
    padding: 24px;
    box-shadow: $shadow;
    .title {
        font-family: "Lato-Bold";
        font-size: 18px;
        color: $blue;
        margin-bottom: 24px;
    }
    .detail-container {
        margin: 8px 0;
        .name {
            font-family: "Lato-Regular";
            font-weight: bold;
            width: 260px;
        }
        .value {
            color: $grey;
        }
    }
}
</style>
