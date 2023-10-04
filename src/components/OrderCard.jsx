import CardList from "./Cards/CardList.jsx";
import "../assets/scss/elements/order-card.scss";
import CardHeader from "./Cards/CardHeader.jsx";
import Card from "./Cards/Card.jsx";
import React, {useEffect, useState} from "react";
import axios from "axios";
export default function OrderCard({title}){
	const {nonce,ajaxUrl,translate_array} = hexReportData;

	const [totalSalesAmount, setTotalSalesAmount] = useState({
		totalOrdersAmount: 0,
	});

	const [totalSalesAmountPhases, setTotalSalesAmountPhases] = useState({
		totalCompletedOredersFromJanToApr: 0,
		totalCompletedOredersFromMayToAug: 0,
		totalCompletedOredersFromSepToDec: 0,
	});


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
						totalOrdersAmount : data.totalOrdersAmount,
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
					action: 'total_completed_order_in_three_phases',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTotalSalesAmountPhases({
						totalCompletedOredersFromJanToApr : data.totalCompletedOredersFromJanToApr,
						totalCompletedOredersFromMayToAug : data.totalCompletedOredersFromMayToAug,
						totalCompletedOredersFromSepToDec : data.totalCompletedOredersFromSepToDec,
					})
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	const {totalOrdersAmount} = totalSalesAmount;

	const {totalCompletedOredersFromJanToApr,totalCompletedOredersFromMayToAug,totalCompletedOredersFromSepToDec} = totalSalesAmountPhases;

	let dailyAverageSale = totalOrdersAmount / 365;

    const cardListItems = [
        {title: translate_array.totalOrders,amount: "$"+totalOrdersAmount},
        {title: translate_array.daylyAverage,amount: "$"+dailyAverageSale},
        {title: translate_array.janToApr,amount: "$"+totalCompletedOredersFromJanToApr},
        {title: translate_array.mayToAug,amount: "$"+totalCompletedOredersFromMayToAug},
        {title: translate_array.sepToDec,amount: "$"+totalCompletedOredersFromSepToDec},
    ];
    return (
        <Card>
            <CardHeader title={translate_array.orders} align="center"/>
            <CardList lists={cardListItems}/>
        </Card>
    )
}
