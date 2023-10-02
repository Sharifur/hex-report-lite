import Container from "../Layouts/Container.jsx";
import DashBox from "../Elements/DashBox.jsx";
import SalesChart from "../charts/SalesChart.jsx";
import Card from "../Cards/Card.jsx";
import {DoughnutChart} from "../charts/DoughnutChart.jsx";
import CardList from "../Cards/CardList.jsx";
import OrderCard from "../OrderCard.jsx";
import PageHeader from "../Sections/PageHeader.jsx";
import Select from "../Elements/Select.jsx";
import axios from "axios";
import React, {useEffect,useState} from 'react';

export default function Dashboard(){
	const [totalSalesAmount, setTotalSalesAmount] = useState({
		totalSales: 0,
		totalCancelledAmount: 0,
		totalOrdersAmount: 0,
		totalRefundedAmount: 0,
		topSellingProductName: '',
		topSellingProductPrice: 0,
		topSellingCatName: '',
		topSellingCatPrice: 0,
	});

	const {nonce,ajaxUrl,translate_array} = hexReportData;

	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'total_sales_amount',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTotalSalesAmount({
						totalSales : data.totalSales,
						totalCancelledAmount : data.totalCancelledAmount,
						totalOrdersAmount : data.totalOrdersAmount,
						totalRefundedAmount : data.totalRefundedAmount,
						topSellingProductName : data.topSellingProductName,
						topSellingProductPrice : data.topSellingProductPrice,
						topSellingCatName : data.topSellingCatName,
						topSellingCatPrice : data.topSellingCatPrice,
					})
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	const {totalSales,totalCancelledAmount,totalOrdersAmount,totalRefundedAmount,topSellingProductName,topSellingProductPrice,topSellingCatName,topSellingCatPrice} = totalSalesAmount;

    const cardListItems = [
        {title: "Marketing",amount: "(30.00%)"},
        {title: "Returns",amount: "(30.00%)"},
        {title: "Net Profit",amount: "(30.00%)"},
        {title: "Taxes",amount: "(30.00%)"},
        {title: "Transaction",amount: "(30.00%)"},
        {title: "Experience",amount: "(30.00%)"},
    ];

    return (
        <>
            <Container col={3}>
				<DashBox title={translate_array.totalSales} text={totalSales} />
				<DashBox title={translate_array.totalOrders} text={totalOrdersAmount}  />
				<DashBox title={translate_array.totalCost} text={totalCancelledAmount} />
				<DashBox title={`${translate_array.topSellingProduct} ${topSellingProductName}`} text={topSellingProductPrice} />

				<DashBox title={`${translate_array.topSellingCatName} ${topSellingCatName}`} text={topSellingCatPrice}  />
				<DashBox title={translate_array.refunded} text={totalRefundedAmount} />
            </Container>
            <Container col={2} extraClass={'margin-top-30'}>
                <SalesChart title={translate_array.sales}/>
                <SalesChart title={translate_array.visitors}/>
            </Container>
            <Container col={2} extraClass={'margin-top-30'}>
                <Card>
                    <div className="chartWithListWrapper">
                        <div className="donChart">
                            <DoughnutChart/>
                        </div>
                        <div className="orderListWrapper">
                            <CardList lists={cardListItems}/>
                        </div>
                    </div>
                </Card>
                <OrderCard title="Orders"/>
            </Container>
        </>
    )
}
