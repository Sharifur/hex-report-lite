import React, { useEffect, useState } from 'react';
import {
	Chart as ChartJS,
	CategoryScale,
	LinearScale,
	BarElement,
	Title,
	Tooltip,
	Legend,
} from 'chart.js';
import { Bar } from 'react-chartjs-2';
import { __ } from "@wordpress/i18n";
import axios from "axios";

ChartJS.register(
	CategoryScale,
	LinearScale,
	BarElement,
	Title,
	Tooltip,
	Legend
);

export const options = {
	responsive: true,
	plugins: {
		legend: {
			position: 'top',
		},
		title: {
			display: true,
			text: __("Top two products selling comparison", "hexreport"),
		},
	},
};

const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

export default function BarChart({ title }) {
	// set initial value of the chart data
	const [chartData, setChartData] = useState({
		labels,
		datasets: [
			{
				label: 'Product 1',
				data: [5, 10, 58, 7, 8, 45, 125, 300, 44, 333, 11, 77],
				backgroundColor: 'rgba(255, 99, 132, 0.5)',
			},
			{
				label: 'Product 2',
				data: [], // Initialize with an empty array
				backgroundColor: 'rgba(53, 162, 235, 0.5',
			},
		],
	});

	// Function to update the chart data
	const updateChartData = () => {
		const { nonce, ajaxUrl, translate_array } = hexReportData;

		// Axios request for Product 1 data
		const request1 = axios.get(ajaxUrl, {
			params: {
				nonce: nonce,
				action: 'show_first_top_selling_product_monthly_data',
			},
			headers: {
				'Content-Type': 'application/json',
			},
		});

		// Axios request for Product 2 data
		const request2 = axios.get(ajaxUrl, {
			params: {
				nonce: nonce,
				action: 'get_second_top_product_monthly_data',
			},
			headers: {
				'Content-Type': 'application/json',
			},
		});

		const request3 = axios.get(ajaxUrl,{
			params: {
				nonce: nonce,
				action: 'get_top_two_selling_product_name',
			},
			headers: {
				'Content-Type' : 'application/json',
			},
		})

		// Use Promise.all to wait for both requests to resolve
		Promise.all([request1, request2, request3])
			.then(([response1, response2,response3]) => {
				if (response1.data && response2.data && response3.data) {
					const firstProductMonthlyData = response1.data.firstTopSellingProductMonthlyData;
					const secondProductMonthlyData = response2.data.secondTopSellingProductMonthlyData;
					const firstProductName = response3.data.firstTopSellingProductName;
					const secondProductName = response3.data.secondTopSellingProductName;

					const newData = {
						labels,
						datasets: [
							{
								label: __(firstProductName,"hexreport"),
								data: __(firstProductMonthlyData,"hexreport"),
								backgroundColor: 'rgba(255, 99, 132, 0.5)',
							},
							{
								label: __(secondProductName,"hexreport"),
								data: __(secondProductMonthlyData,"hexreport"),
								backgroundColor: 'rgba(53, 162, 235, 0.5',
							},
						],
					};

					setChartData(newData);
				}
			})
			.catch((error) => {
				console.error('Error:', error);
			});
	};

	useEffect(() => {
		// Calling the function to update chart data
		updateChartData();
	}, []);

	return (
		<div className="chartWrapper">
			<div className="topPart">
				<h4 className="title">{title}</h4>
			</div>
			<Bar options={options} data={chartData} />
		</div>
	);
}
