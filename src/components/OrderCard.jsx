import CardList from "./Cards/CardList.jsx";
import "../assets/scss/elements/order-card.scss";
import CardHeader from "./Cards/CardHeader.jsx";
import Card from "./Cards/Card.jsx";
export default function OrderCard({title}){
    const cardListItems = [
        {title: "Total Orders",amount: "$60,000"},
        {title: "Daily Average",amount: "$20,000"},
        {title: "September 23",amount: "$40,000"},
        {title: "October 23",amount: "$50,000"},
        {title: "January 22",amount: "$20,000"},
    ];
    return (
        <Card>
            <CardHeader title="Orders" align="center"/>
            <CardList lists={cardListItems}/>
        </Card>
    )
}
