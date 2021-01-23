<template>
    <div class="CancellationRequests">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <table class="new-clients-table" id="newClientsTable">
            <thead>
                <tr>
                    <th class="username-head" data-order="asc">
                        <div class="table-head-flex">
                            <p class="title">Name</p>
                            <img
                                src="/images/admin/icons/reports.svg"
                                alt=""
                                class="table-head-icon"
                            />
                        </div>
                    </th>
                    <th class="phone-head">
                        <div class="table-head-flex">
                            <p class="title">Phone Number</p>
                            <img
                                src="/images/admin/icons/reports.svg"
                                alt=""
                                class="table-head-icon"
                            />
                        </div>
                    </th>
                    <th class="date-head">
                        <div class="table-head-flex">
                            <p class="title">Request Date</p>
                            <img
                                src="/images/admin/icons/reports.svg"
                                alt=""
                                class="table-head-icon"
                            />
                        </div>
                    </th>
                    <th class="package-head">
                        <div class="table-head-flex">
                            <p class="title">Package Name</p>
                            <img
                                src="/images/admin/icons/reports.svg"
                                alt=""
                                class="table-head-icon"
                            />
                        </div>
                    </th>
                    <th class="package-head">
                        <div class="table-head-flex">
                            <p class="title">Service Status</p>
                            <img
                                src="/images/admin/icons/reports.svg"
                                alt=""
                                class="table-head-icon"
                            />
                        </div>
                    </th>
                    <th class="package-head">
                        <div class="table-head-flex">
                            <p class="title">Request Status</p>
                            <img
                                src="/images/admin/icons/reports.svg"
                                alt=""
                                class="table-head-icon"
                            />
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="client in clients" :key="client.id">
                    <td class="username-cell">
                        <p class="link" @click="goToShowUser(client.id)">
                            {{ client.name }}
                        </p>
                    </td>
                    <td class="city-cell">{{ client.phone }}</td>
                    <td class="date-cell">{{ client.request_date }}</td>
                    <td class="package-cell">{{ client.package_name }}</td>
                    <td class="package-cell">{{ client.service_status }}</td>
                    <td class="package-cell">{{ client.request_status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ["title", "date", "clients", "showuserroute"],
    methods: {
        goToShowUser(id) {
            var url = this.showuserroute.replace("user_id", id);
            window.location.href = url;
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;

.CancellationRequests {
    width: 100%;
    height: 100%;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }

    .new-clients-table {
        width: 100%;
        border-collapse: collapse;
        th,
        td {
            margin: 0;
            border-bottom: 1px solid $light-grey;
            text-align: left;
            padding: 12px 0;
        }
        th {
            color: $text-grey;
            font-size: 16px;
            font-family: "Open-Sans-Regular";
            font-weight: lighter;
        }
        td {
            font-size: 14px;
        }

        .table-head-flex {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;

            .table-head-icon {
                margin-left: 10px;
                margin-top: 15px;
            }
        }
        .username-head {
            width: 150px;
            position: relative;
        }
        .username-cell {
            color: $blue;
            font-family: "Open-Sans-Semibold";
            .link {
                cursor: pointer;
            }
        }
    }
}
</style>
