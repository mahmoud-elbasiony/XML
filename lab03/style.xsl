<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="style.xsl"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="3.0">
	<xsl:template match="/employees" name="xsl:initial-template">
		<html>
			<head>
				<title>xml</title>
			</head>
			<body>
			<h2>Emplyees table</h2>
				<table border="1">
					<thead>
					
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Street</th>
							<th>Building Number</th>
							<th>City</th>
							<th>Region</th>
							<th>Country</th>
						</tr>
					</thead>
					<tbody>
						<xsl:for-each select="employee">
							<tr bgcolor="#9acd32">
								<td>
									<xsl:value-of select="name"/>
								</td>
								<td>
									<xsl:value-of select="@email"/>
								</td>
								<td>
									<xsl:value-of select="phone"/>
								</td>
								<td>
									<xsl:value-of select="address/street"/>
								</td>
								<td>
									<xsl:value-of select="address/buildingNumber"/>
								</td>
								<td>
									<xsl:value-of select="address/city"/>
								</td>
								<td>
									<xsl:value-of select="address/region"/>
								</td>
								<td>
									<xsl:value-of select="address/country"/>
								</td>
							</tr>
						</xsl:for-each>
					</tbody>
				</table>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
