<template>
    <div class="card-container PackageUserscard">
        <a :href="showpackageroute.replace('package_id', id)">
            <div
                class="PackageUserscard"
                :id="id"
                @click="$emit('show-package-users', id)"
            >
                <p class="package-name">{{ name }}</p>

                <!-- <img src="/images/admin/icons/delete-icon.svg" /> -->
            </div>
        </a>
        <span @click="$emit('delete-package')" class="mx-1 delete-icon">X</span>
    </div>
</template>

<script>
export default {
    props: ["id", "name", "count", "showpackageroute"]
};
</script>

<style lang="scss">
$blue: #22aee4;
$black: #000;
$text-grey: #00000080;
$light-grey: #eef2f4;
.card-container {
    position: relative;
}
.PackageUserscard {
    width: 200px;
    height: 150px;
    margin: 12px 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    color: $black;
    box-shadow: 0px 0px 3px #0000001a;
    border-radius: 20px;
    border: 1px solid #ddd;
    cursor: pointer;
    position: relative;
    &.active-card {
        color: $blue !important;
        border: 1px solid $blue;
    }
    .package-name {
        font-family: "Open-Sans-Regular";
        color: $black;
        font-size: 16px;
    }
    .packages-users-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
}
.delete-icon {
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>
