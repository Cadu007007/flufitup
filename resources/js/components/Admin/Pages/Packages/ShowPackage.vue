<template>
    <div class="ShowPackage">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="page-container">
            <PackageDetailsCard class="package-details" :package="package" />

            <PackagePriceCard
                class="package-price-card-container"
                :price="package.price"
                @go-to-edit-package="goToEditPackage"
            />
        </div>
    </div>
</template>

<script>
import PackageDetailsCard from "./Components/PackageDetailsCard";
import PackagePriceCard from "./Components/PackagePriceCard";

export default {
    data() {
        return {
            title: "Package Summary"
        };
    },
    props: ["date", "package", "editpackageroute"],
    components: {
        PackageDetailsCard,
        PackagePriceCard
    },
    methods: {
        goToEditPackage() {
            var url = this.editpackageroute.replace(
                "package_id",
                this.package.id
            );
            window.location.href = url;
        }
    }
};
</script>
<style lang="scss">
$text-grey: #00000066;

.ShowPackage {
    padding: 0 140px 0 16px;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }

    .page-container {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
        flex-wrap: wrap;
        .package-details {
            margin: 8px 4px 8px 0;
        }
        .package-price-card-container {
          margin-left: 100px;
        }
    }
}
</style>
