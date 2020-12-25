<template>
<a :href="showpackageroute.replace('package_id',id)">
    <div class="PackageUserscard" :id="id" @click="$emit('show-package-users' , id)">
        <p class="package-name">{{ name}}</p>
        <div class="packages-users-container">
            <p class="users-count">({{ count }})</p>
            <p class="subscribers">Subscribers</p>
        </div>
    </div>
</a>
</template>

<script>
export default {
    props: ['id','name','count','showpackageroute'],

}
</script>

<style lang="scss">
$blue: #22AEE4;
$black: #000;
$text-grey: #00000080;
$light-grey:#EEF2F4;
.PackageUserscard{
    width: 200px;
    height: 150px;
    margin: 12px 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    color: $black;
    box-shadow: 0px 0px 3px #0000001A;
    border-radius: 20px;
    border: 1px solid transparent;
    cursor: pointer;
    &.active-card{
    color: $blue !important;
    border: 1px solid $blue;
    }
    .package-name{
        font-family: 'Open-Sans-Regular';
        color: $black;
        font-size: 16px;
    }
    .packages-users-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        .users-count, .subscribers{
            color: $blue;
            font-family: 'Open-Sans-Bold';
            font-size: 18px;
        }
    }
    
}
    
    
    
</style>