USE [ScadaDB]
GO

/****** Object:  Table [dbo].[work_permit]    Script Date: 12-May-20 13:27:40 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[work_permit](
	[id_wp] [int] IDENTITY(1,1) NOT NULL,
	[tgl_pengajuan] [date] NULL,
	[jenis_pekerjaan] [varchar](200) NULL,
	[detail_pekerjaan] [varchar](200) NULL,
	[lokasi_pekerjaan] [varchar](200) NULL,
	[pengawas_pekerjaan] [varchar](200) NULL,
	[no_pengawas_pekerjaan] [varchar](50) NULL,
	[pengawas_k3] [varchar](200) NULL,
	[no_pengawas_k3] [varchar](50) NULL,
	[tgl_mulai] [date] NULL,
	[tgl_selesai] [date] NULL,
	[jam_mulai] [text] NULL,
	[jam_selesai] [text] NULL,
	[klasifikasi_pekerjaan] [text] NULL,
	[klasifikasi_pekerjaan_lain] [text] NULL,
	[prosedur_pekerjaan] [text] NULL,
	[prosedur_pekerjaan_lain] [text] NULL,
	[nama_pekerjaan] [varchar](200) NULL,
	[perusahaan] [varchar](150) NULL,
	[alamat] [text] NULL,
	[contact_person] [varchar](100) NULL,
	[jabatan] [varchar](150) NULL,
	[tanda_tangan] [varchar](200) NULL,
	[no_hp] [varchar](50) NULL,
	[status_kantor] [varchar](50) NULL,
	[area] [int] NULL,
	[rayon] [int] NULL,
	[status_padam] [int] NULL,
	[status_grounding] [int] NULL,
	[izin_identifikasi_bahaya] [text] NULL,
	[izin_line_diagram] [text] NULL,
	[izin_pelaksana] [text] NULL,
	[izin_peralatan] [text] NULL,
	[izin_safety] [text] NULL,
	[izin_prosedur] [text] NULL,
	[izin_bpjs] [text] NULL,
	[izin_sertifikat] [text] NULL,
	[izin_k3] [text] NULL,
	[izin_foto] [text] NULL,
	[manager] [int] NULL,
	[supervisor] [int] NULL,
	[pejabat] [int] NULL,
	[pengawas] [int] NULL,
	[peralatan] [text] NULL,
	[id_area] [int] NULL,
	[id_rayon] [int] NULL,
	[alat_pelindung_diri] [text] NULL,
	[perlengkapan_keselamatan] [text] NULL,
	[alat_pelindung_diri_lain] [text] NULL,
	[perlengkapan_keselamatan_lain] [text] NULL,
	[managerwp] [int] NULL,
	[supervisorwp] [int] NULL,
	[pelaksanawp] [int] NULL,
	[izin_managerwp] [int] NULL,
	[izin_supervisorwp] [int] NULL,
	[izin_pelaksanawp] [int] NULL,
	[reject_supervisorwp] [varchar](150) NULL,
	[reject_managerwp] [text] NULL,
	[reject_pelaksanawp] [text] NULL,
	[keterangan_ba] [text] NULL,
	[status_selesai] [int] NULL,
	[id_user] [int] NULL,
	[id_template] [int] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO



