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

	const [totalOrdersRation, setTotalOrdersRation] = useState({
		cancelledOrderRation: 0,
		refundedOrderRation: 0,
		failedOrderRation: 0,
	});

	const [totalSalesOfYear , setTotalSalesOfYear] = useState([]);
	const [totalVisitorsCount , setTotalVisitorsCount] = useState([]);

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

	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'total_order_ratio',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTotalOrdersRation({
						cancelledOrderRation : data.cancelledOrderRation,
						refundedOrderRation : data.refundedOrderRation,
						failedOrderRation : data.failedOrderRation,
					})
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'total_sales_amount_for_year',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTotalSalesOfYear(data.totalSalesOfYear)
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'total_visitors_count_for_year',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTotalVisitorsCount(data.totalVisitorsCount)
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	const {totalSales,totalCancelledAmount,totalOrdersAmount,totalRefundedAmount,topSellingProductName,topSellingProductPrice,topSellingCatName,topSellingCatPrice} = totalSalesAmount;

	const {cancelledOrderRation,refundedOrderRation,failedOrderRation} = totalOrdersRation;

    const cardListItems = [
        {title: translate_array.cancelled,amount: "("+cancelledOrderRation.toFixed(2)+"%)"},
        {title: translate_array.refunded,amount: "("+refundedOrderRation.toFixed(2)+"%)"},
        {title: translate_array.failed,amount: "("+failedOrderRation.toFixed(2)+"%)"},
        {title: translate_array.directBankTranser,amount: "(30.00%)"},
        {title: translate_array.checkPayments,amount: "(30.00%)"},
        {title: translate_array.cashOnDelivery,amount: "(30.00%)"},
    ];

    return (
        <>
            <Container col={3}>
				<DashBox title={translate_array.totalSales} text={totalSales} />
				<DashBox title={translate_array.totalOrders} text={totalOrdersAmount}  />
				<DashBox title={translate_array.cancelledOrders} text={totalCancelledAmount} />
				<DashBox title={`${translate_array.topSellingProduct} ${topSellingProductName}`} text={topSellingProductPrice} />

				<DashBox title={`${translate_array.topSellingCatName} ${topSellingCatName}`} text={topSellingCatPrice}  />
				<DashBox title={translate_array.refunded} text={totalRefundedAmount} />
            </Container>
            <Container col={2} extraClass={'margin-top-30'}>
                <SalesChart title={translate_array.sales} data={totalSalesOfYear}/>
                <SalesChart title={translate_array.visitors} data={totalVisitorsCount}/>
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
