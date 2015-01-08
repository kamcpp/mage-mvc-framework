<html>
<head>
	<title>News</title>
</head>
<body>
    <a href="AddNews">ADD NEWS</a>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Text</th>
			<th>Issue Date</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		{foreach $news as $item}
			<tr>
				<td>{$item->getId()}</td>
				<td>{$item->getTitle()}</td>
				<td>{$item->getText()}</td>
				<td>{$item->getIssueDate()}</td>
				<td><a href="UpdateNews?id={$item->getId()}">UPDATE</a></td>
				<td><a href="DeleteNews?id={$item->getId()}">DELETE</a></td>
			</tr>
		{/foreach}
	</table>
</body>
</html>