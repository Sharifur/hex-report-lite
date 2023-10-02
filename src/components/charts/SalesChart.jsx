import {
	Chart as ChartJS,
	CategoryScale,
	LinearScale,
	PointElement,
	LineElement,
	Title,
	Tooltip,
	Filler,
	Legend,
} from 'chart.js';
import { Line } from 'react-chartjs-2';
import "./../../assets/scss/elements/chart.scss";
import { useEffect, useState } from "react";
import axios from "axios";

ChartJS.register(
	CategoryScale,
	LinearScale,
	PointElement,
	LineElement,
	Title,
	Tooltip,
	Filler,
	Legend
);

export const options = {
	responsive: true,
	plugins: {
		legend: {
			position: 'top',
		},
		title: {
			display: false,
			text: 'Chart.js Line Chart',
		},
	},
};

const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

export default function SalesChart({ title }) {
	const {nonce,ajaxUrl,translate_array} = hexReportData;
	const [totalSalesOfYear, setTotalSalesOfYear] = useState([]);
	const [loading, setLoading] = useState(true); // Add loading state

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
			.then(({ data }) => {
				if (data) {
					console.log(data.totalSalesOfYear);
					setTotalSalesOfYear(data.totalSalesOfYear);
				}
				setLoading(false); // Set loading to false when data is fetched
			})
			.catch((error) => {
				console.error('Error:', error);
				setLoading(false); // Set loading to false on error
			});

	}, []);

	const data = {
		labels,
		datasets: [
			{
				fill: true,
				label: ' ',
				data: totalSalesOfYear,
				borderColor: 'rgb(53, 162, 235)',
				backgroundColor: 'rgba(53, 162, 235, 0.5)',
			},
		],
	};

	return (
		<div className="chartWrapper">
			<div className="topPart">
				<h4 className="title">{title}</h4>
			</div>
			{loading ? (
				<p>Loading data...</p> // Display loading message while data is being fetched
			) : (
				<Line options={options} data={data} />
			)}
		</div>
	);
}
