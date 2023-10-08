
import PageLayout from "../../components/Layouts/PageLayout.jsx";
import PageHeader from "../../components/Sections/PageHeader.jsx";
import Card from "../../components/Cards/Card.jsx";
import CardHeader from "../../components/Cards/CardHeader.jsx";
import Select from "../../components/Elements/Select.jsx";
import DropDownButton from "../../components/Elements/DropDownButton.jsx";
import "../../assets/scss/sections/common-filter.scss";
import Table from "../../components/Elements/Table/Table.jsx";
import Thead from "../../components/Elements/Table/Thead.jsx";
import Tbody from "../../components/Elements/Table/Tbody.jsx";
// import {tr} from "@faker-js/faker";
import faker from "faker";
import SalesChart from "../../components/charts/SalesChart.jsx";


export default function Sales(){
    const salesChannelOptions = [
        {val: '', text: "Sales By Channel"},
        {val: 'online-store', text: "online store"},
        {val: 'website', text: "Website"},
    ];
    const filterOptions = [
        {val: '', text: "Filter"},
        {val: 'store', text: "store"},
        {val: 'pos', text: "pos"},
    ];

    const daysOptions = [
        {val: '30-days', text: "Last 30 Days"},
        {val: '60-days', text: "Last 60 Days"},
        {val: '90-days', text: "Last 90 Days"},
    ];
    const saveDataDropdowns = [
        {text: "Save as CSV"},
        {text: "Save as Excel"},
    ]

    const TableData = [
        ["online Store","4,032","63164.00","10.616.00","24.29.00","606.775.00","8.7268.00","37.546.00","654.433.00"],
        ["Website","304356","2620312","60.000","124.000","573.750.00","2.756.000","67.660.75","210.000.75"]
    ];

    return (
        <PageLayout pageTitle="Sales By Channel">
            <Card padd="0">
                <CardHeader title="Sales By Channel" pb="0" />
                <div className="commonFilterWrap pb0">
                    <div className="leftWrap">
                        <Select name="salesChannel" options={salesChannelOptions}/>
                        <Select name="filter" options={filterOptions}/>
                    </div>
                    <div className="rightWrap">
                        <Select name="daysFilter" extraClass="noborder" options={daysOptions}/>
                        <DropDownButton text="Save Data" icon="las la-save" dropdowns={saveDataDropdowns}/>
                    </div>
                </div>
                <Table info={{current: 1,items: 10,total: 60}} pagination={{current:1}}>
                    <Thead>
                        <th>Channel Name</th>
                        <th>Orders</th>
                        <th>Gross Sales</th>
                        <th>Discount</th>
                        <th>Returns</th>
                        <th>Net Sales</th>
                        <th>Shipping</th>
                        <th>Taxes</th>
                        <th>Total Sales</th>
                    </Thead>
                    <Tbody>
                        {TableData.map((item,index) => (
                            <tr key={index}>
                                {item.map((td,index) => (
                                    <td key={index}>{td}</td>
                                ))}
                            </tr>
                        ))}
                    </Tbody>
                </Table>
            </Card>
            <Card extraClass="margin-top-20">
                <SalesChart title="Sales By Channel"/>
            </Card>
        </PageLayout>
    );
}
